<?php
namespace App\Http\Controllers\Siswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Karakter;
class KarakterController extends Controller {
    public function index(){
        $u=Auth::user();
        if(!$u->siswa_id) abort(403,'Akun siswa belum terhubung');
        $data=Karakter::where('siswa_id',$u->siswa_id)->latest()->paginate(10);
        return view('siswa.karakter.index',compact('data'));
    }
}
