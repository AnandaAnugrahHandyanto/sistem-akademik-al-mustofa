<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
class GuruController extends Controller {
    public function index(){ $data=Guru::latest()->paginate(10); return view('admin.guru.index',compact('data')); }
    public function create(){ return view('admin.guru.form',['item'=>new Guru(),'action'=>route('admin.guru.store'),'method'=>'POST']); }
    public function store(Request $r){ $v=$r->validate(['nip'=>'required|unique:gurus,nip','nama_lengkap'=>'required','email'=>'nullable|email','no_hp'=>'nullable']); Guru::create($v); return redirect()->route('admin.guru.index')->with('ok','Guru ditambah'); }
    public function edit(Guru $guru){ return view('admin.guru.form',['item'=>$guru,'action'=>route('admin.guru.update',$guru),'method'=>'PUT']); }
    public function update(Request $r, Guru $guru){ $v=$r->validate(['nip'=>'required|unique:gurus,nip,'.$guru->id,'nama_lengkap'=>'required','email'=>'nullable|email','no_hp'=>'nullable']); $guru->update($v); return redirect()->route('admin.guru.index')->with('ok','Guru diupdate'); }
    public function destroy(Guru $guru){ $guru->delete(); return back()->with('ok','Guru dihapus'); }
}
