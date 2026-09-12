<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
class NilaiController extends Controller {
    public function index(){ $data=Nilai::with(['siswa','mataPelajaran'])->latest()->paginate(10); return view('guru.nilai.index',compact('data')); }
    public function create(){ return view('guru.nilai.form',['item'=>new Nilai(),'action'=>route('guru.nilai.store'),'method'=>'POST','siswas'=>Siswa::all(),'mapels'=>MataPelajaran::all()]); }
    public function store(Request $r){ $v=$r->validate(['siswa_id'=>'required|exists:siswas,id','mata_pelajaran_id'=>'required|exists:mata_pelajaran,id','nilai_angka'=>'required|integer|min:0|max:100','semester'=>'required|in:ganjil,genap']); Nilai::create($v); return redirect()->route('guru.nilai.index')->with('ok','Nilai ditambah'); }
    public function edit(Nilai $nilai){ return view('guru.nilai.form',['item'=>$nilai,'action'=>route('guru.nilai.update',$nilai),'method'=>'PUT','siswas'=>Siswa::all(),'mapels'=>MataPelajaran::all()]); }
    public function update(Request $r, Nilai $nilai){ $v=$r->validate(['siswa_id'=>'required|exists:siswas,id','mata_pelajaran_id'=>'required|exists:mata_pelajaran,id','nilai_angka'=>'required|integer|min:0|max:100','semester'=>'required|in:ganjil,genap']); $nilai->update($v); return redirect()->route('guru.nilai.index')->with('ok','Nilai diupdate'); }
    public function destroy(Nilai $nilai){ $nilai->delete(); return back()->with('ok','Nilai dihapus'); }
}
