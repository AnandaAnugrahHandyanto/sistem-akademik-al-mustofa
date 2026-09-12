<?php
namespace App\Http\Controllers\Ortu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Nilai;
class NilaiController extends Controller {
    public function index(){
        $user=Auth::user();
        if(!$user->siswa_id) abort(403,'Akun ortu belum terhubung ke siswa');
        $data=Nilai::with('mataPelajaran')->where('siswa_id',$user->siswa_id)->latest()->paginate(10);
        return view('ortu.nilai.index',compact('data'));
    }
}
