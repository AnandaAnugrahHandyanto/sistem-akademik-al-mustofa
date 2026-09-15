<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use App\Models\Hafalan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HafalanController extends Controller
{
    public function index(Request $r){
        $q=Hafalan::with('siswa')->latest();
        if($r->filled('kelas')) $q->whereHas('siswa',fn($x)=>$x->where('kelas',$r->kelas));
        if($r->filled('jenis')) $q->where('jenis_hafalan',$r->jenis);
        $data=$q->paginate(10)->withQueryString();
        $kelas=Siswa::select('kelas')->distinct()->pluck('kelas');
        return view('guru.hafalan.index',compact('data','kelas'));
    }
    public function create(){ return view('guru.hafalan.form',['item'=>new Hafalan(),'action'=>route('guru.hafalan.store'),'method'=>'POST','siswas'=>Siswa::all()]); }
    public function store(Request $r){
        $v=$r->validate([
            'siswa_id'=>'required|exists:siswas,id',
            'jenis_hafalan'=>'required|in:surat_pendek,doa,hadis',
            'surat'=>'required|string|max:100',
            'ayat_mulai'=>'nullable|integer|min:1',
            'ayat_selesai'=>'nullable|integer|min:1|gte:ayat_mulai',
            'total_ayat'=>'nullable|integer|min:1',
            'status'=>'nullable|in:baru,ulang,lulus',
            'progress'=>'required|integer|min:0|max:100',
            'tanggal'=>'required|date',
            'audio'=>'nullable|file|mimes:mp3,wav,m4a,ogg|max:5120',
        ]);
        // auto-calc progress jika ayat range + total terisi
        if($r->filled('ayat_mulai') && $r->filled('ayat_selesai') && $r->filled('total_ayat')){
            $calc=Hafalan::calcProgress((int)$r->ayat_mulai,(int)$r->ayat_selesai,(int)$r->total_ayat);
            if($calc!==null) $v['progress']=$calc;
        }
        $v['status']=$r->input('status','baru');
        if($r->hasFile('audio')){
            $v['audio']=$r->file('audio')->store('hafalan','public');
        }
        Hafalan::create($v);
        return redirect()->route('guru.hafalan.index')->with('ok','Hafalan ditambah');
    }
    public function edit(Hafalan $hafalan){ return view('guru.hafalan.form',['item'=>$hafalan,'action'=>route('guru.hafalan.update',$hafalan),'method'=>'PUT','siswas'=>Siswa::all()]); }
    public function update(Request $r, Hafalan $hafalan){
        $v=$r->validate([
            'siswa_id'=>'required|exists:siswas,id',
            'jenis_hafalan'=>'required|in:surat_pendek,doa,hadis',
            'surat'=>'required|string|max:100',
            'ayat_mulai'=>'nullable|integer|min:1',
            'ayat_selesai'=>'nullable|integer|min:1|gte:ayat_mulai',
            'total_ayat'=>'nullable|integer|min:1',
            'status'=>'nullable|in:baru,ulang,lulus',
            'progress'=>'required|integer|min:0|max:100',
            'tanggal'=>'required|date',
            'audio'=>'nullable|file|mimes:mp3,wav,m4a,ogg|max:5120',
        ]);
        if($r->filled('ayat_mulai') && $r->filled('ayat_selesai') && $r->filled('total_ayat')){
            $calc=Hafalan::calcProgress((int)$r->ayat_mulai,(int)$r->ayat_selesai,(int)$r->total_ayat);
            if($calc!==null) $v['progress']=$calc;
        }
        $v['status']=$r->input('status','baru');
        if($r->hasFile('audio')){
            if($hafalan->audio) Storage::disk('public')->delete($hafalan->audio);
            $v['audio']=$r->file('audio')->store('hafalan','public');
        } else {
            unset($v['audio']);
        }
        $hafalan->update($v);
        return redirect()->route('guru.hafalan.index')->with('ok','Hafalan diupdate');
    }
    public function destroy(Hafalan $hafalan){
        if($hafalan->audio) Storage::disk('public')->delete($hafalan->audio);
        $hafalan->delete();
        return back()->with('ok','Hafalan dihapus');
    }
}
