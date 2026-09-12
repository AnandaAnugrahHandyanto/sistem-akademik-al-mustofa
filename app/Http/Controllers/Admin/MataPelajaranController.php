<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use App\Models\Guru;
use Illuminate\Http\Request;
class MataPelajaranController extends Controller {
    public function index(){ $data=MataPelajaran::with('guru')->latest()->paginate(10); return view('admin.mapel.index',compact('data')); }
    public function create(){ $gurus=Guru::all(); return view('admin.mapel.form',['item'=>new MataPelajaran(),'action'=>route('admin.mapel.store'),'method'=>'POST','gurus'=>$gurus]); }
    public function store(Request $r){ $v=$r->validate(['nama'=>'required','guru_id'=>'nullable|exists:gurus,id']); MataPelajaran::create($v); return redirect()->route('admin.mapel.index')->with('ok','Mapel ditambah'); }
    public function edit(MataPelajaran $mapel){ $gurus=Guru::all(); return view('admin.mapel.form',['item'=>$mapel,'action'=>route('admin.mapel.update',$mapel),'method'=>'PUT','gurus'=>$gurus]); }
    public function update(Request $r, MataPelajaran $mapel){ $v=$r->validate(['nama'=>'required','guru_id'=>'nullable|exists:gurus,id']); $mapel->update($v); return redirect()->route('admin.mapel.index')->with('ok','Mapel diupdate'); }
    public function destroy(MataPelajaran $mapel){ $mapel->delete(); return back()->with('ok','Mapel dihapus'); }
}
