<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
class SiswaController extends Controller {
    public function index(){ $data=Siswa::latest()->paginate(10); return view('admin.siswa.index',compact('data')); }
    public function create(){ return view('admin.siswa.form',['item'=>new Siswa(),'action'=>route('admin.siswa.store'),'method'=>'POST']); }
    public function store(Request $r){ $v=$r->validate(['nis'=>'required|unique:siswas,nis','nama_lengkap'=>'required','kelas'=>'required','rombel'=>'required','jenis_kelamin'=>'required|in:L,P']); Siswa::create($v); return redirect()->route('admin.siswa.index')->with('ok','Siswa ditambah'); }
    public function edit(Siswa $siswa){ return view('admin.siswa.form',['item'=>$siswa,'action'=>route('admin.siswa.update',$siswa),'method'=>'PUT']); }
    public function update(Request $r, Siswa $siswa){ $v=$r->validate(['nis'=>'required|unique:siswas,nis,'.$siswa->id,'nama_lengkap'=>'required','kelas'=>'required','rombel'=>'required','jenis_kelamin'=>'required|in:L,P']); $siswa->update($v); return redirect()->route('admin.siswa.index')->with('ok','Siswa diupdate'); }
    public function destroy(Siswa $siswa){ $siswa->delete(); return back()->with('ok','Siswa dihapus'); }
}
