<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;
class KelasController extends Controller {
    public function index(){ $data=Kelas::latest()->paginate(10); return view('admin.kelas.index',compact('data')); }
    public function create(){ return view('admin.kelas.form',['item'=>new Kelas(),'action'=>route('admin.kelas.store'),'method'=>'POST']); }
    public function store(Request $r){ $v=$r->validate(['nama_kelas'=>'required','tingkat'=>'required','rombel'=>'required']); Kelas::create($v); return redirect()->route('admin.kelas.index')->with('ok','Kelas ditambah'); }
    public function edit(Kelas $kelas){ return view('admin.kelas.form',['item'=>$kelas,'action'=>route('admin.kelas.update',$kelas),'method'=>'PUT']); }
    public function update(Request $r, Kelas $kelas){ $v=$r->validate(['nama_kelas'=>'required','tingkat'=>'required','rombel'=>'required']); $kelas->update($v); return redirect()->route('admin.kelas.index')->with('ok','Kelas diupdate'); }
    public function destroy(Kelas $kelas){ $kelas->delete(); return back()->with('ok','Kelas dihapus'); }
}
