<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller {
    public function index(){ $data=User::latest()->paginate(10); return view('admin.user.index',compact('data')); }
    public function create(){ return view('admin.user.form',['item'=>new User(),'action'=>route('admin.user.store'),'method'=>'POST','siswas'=>Siswa::all(),'gurus'=>Guru::all()]); }
    public function store(Request $r){ $v=$r->validate(['name'=>'required','username'=>'required|unique:users,username','email'=>'required|email|unique:users,email','password'=>'required|min:6','role'=>'required|in:admin,guru,ortu,siswa','siswa_id'=>'nullable|exists:siswas,id','guru_id'=>'nullable|exists:gurus,id']); $v['password']=Hash::make($v['password']); User::create($v); return redirect()->route('admin.user.index')->with('ok','User ditambah'); }
    public function edit(User $user){ return view('admin.user.form',['item'=>$user,'action'=>route('admin.user.update',$user),'method'=>'PUT','siswas'=>Siswa::all(),'gurus'=>Guru::all()]); }
    public function update(Request $r, User $user){ $v=$r->validate(['name'=>'required','username'=>'required|unique:users,username,'.$user->id,'email'=>'required|email|unique:users,email,'.$user->id,'password'=>'nullable|min:6','role'=>'required|in:admin,guru,ortu,siswa','siswa_id'=>'nullable|exists:siswas,id','guru_id'=>'nullable|exists:gurus,id']); if(!empty($v['password'])) $v['password']=Hash::make($v['password']); else unset($v['password']); $user->update($v); return redirect()->route('admin.user.index')->with('ok','User diupdate'); }
    public function destroy(User $user){ $user->delete(); return back()->with('ok','User dihapus'); }
}
