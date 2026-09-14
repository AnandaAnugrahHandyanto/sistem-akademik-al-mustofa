<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Hafalan;
use App\Models\Karakter;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $mapel = MataPelajaran::orderBy('nama')->get();
        $jenis = $request->get('jenis','nilai');
        $filterKelas = $request->get('kelas');
        $filterMapel = $request->get('mapel');
        $filterSemester = $request->get('semester');
        $preview = false;
        $data = collect();

        if ($request->has('preview') || $request->has('cetak')) {
            $preview = true;
            if ($jenis==='nilai') {
                $q = Nilai::with(['siswa','mataPelajaran']);
                if ($filterMapel) $q->where('mata_pelajaran_id',$filterMapel);
                if ($filterSemester) $q->where('semester',$filterSemester);
                if ($filterKelas) $q->whereHas('siswa', fn($s)=>$s->where('kelas',$filterKelas));
                $data = $q->orderByDesc('id')->limit(200)->get();
            } elseif ($jenis==='hafalan') {
                $q = Hafalan::with('siswa');
                if ($filterKelas) $q->whereHas('siswa', fn($s)=>$s->where('kelas',$filterKelas));
                $data = $q->orderByDesc('id')->limit(200)->get();
            } else {
                $q = Karakter::with('siswa');
                if ($filterKelas) $q->whereHas('siswa', fn($s)=>$s->where('kelas',$filterKelas));
                $data = $q->orderByDesc('id')->limit(200)->get();
            }
        }

        if ($request->has('cetak')) {
            return $this->cetak($request, $data, $jenis);
        }

        return view('admin.laporan.index', compact('kelas','mapel','jenis','filterKelas','filterMapel','filterSemester','data','preview'));
    }

    public function cetak(Request $request, $data=null, $jenis=null)
    {
        $jenis = $jenis ?? $request->get('jenis','nilai');
        $filterKelas = $request->get('kelas');
        $filterMapel = $request->get('mapel');
        $filterSemester = $request->get('semester');
        if (!$data || $data->isEmpty()) {
            if ($jenis==='nilai') {
                $q = Nilai::with(['siswa','mataPelajaran']);
                if ($filterMapel) $q->where('mata_pelajaran_id',$filterMapel);
                if ($filterSemester) $q->where('semester',$filterSemester);
                if ($filterKelas) $q->whereHas('siswa', fn($s)=>$s->where('kelas',$filterKelas));
                $data = $q->orderByDesc('id')->limit(200)->get();
            } elseif ($jenis==='hafalan') {
                $q = Hafalan::with('siswa');
                if ($filterKelas) $q->whereHas('siswa', fn($s)=>$s->where('kelas',$filterKelas));
                $data = $q->orderByDesc('id')->limit(200)->get();
            } else {
                $q = Karakter::with('siswa');
                if ($filterKelas) $q->whereHas('siswa', fn($s)=>$s->where('kelas',$filterKelas));
                $data = $q->orderByDesc('id')->limit(200)->get();
            }
        }
        $tanggal = now()->format('d F Y');
        $pdf = Pdf::loadView('admin.laporan.pdf', compact('data','jenis','filterKelas','filterMapel','filterSemester','tanggal'));
        $pdf->setPaper('a4','landscape');
        return $pdf->download('laporan-'.$jenis.'-'.now()->format('Ymd_His').'.pdf');
    }
}
