<?php
namespace App\Http\Controllers\Guru;
use App\Http\Controllers\Controller;
use App\Models\Karakter;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KarakterController extends Controller
{
    private const ASPEK=['Disiplin','Jujur','Tanggung Jawab','Santun','Kerjasama','Percaya Diri'];
    public function index(Request $r){
        $q=Karakter::with('siswa')->latest();
        if($r->filled('kelas')) $q->whereHas('siswa',fn($x)=>$x->where('kelas',$r->kelas));
        if($r->filled('aspek')) $q->where('aspek',$r->aspek);
        $data=$q->paginate(10)->withQueryString();
        $kelas=Siswa::select('kelas')->distinct()->pluck('kelas');
        $aspek=self::ASPEK;
        return view('guru.karakter.index',compact('data','kelas','aspek'));
    }
    public function create(){
        return view('guru.karakter.form',['item'=>new Karakter(),'action'=>route('guru.karakter.store'),'method'=>'POST','siswas'=>Siswa::all(),'aspekList'=>self::ASPEK]);
    }
    public function store(Request $r){
        $v=$r->validate([
            'siswa_id'=>'required|exists:siswas,id',
            'aspek'=>'required|in:Disiplin,Jujur,Tanggung Jawab,Santun,Kerjasama,Percaya Diri',
            'nilai'=>'required|in:A,B,C,D',
            'tanggal'=>'required|date',
        ]);
        Karakter::create($v);
        return redirect()->route('guru.karakter.index')->with('ok','Karakter ditambah');
    }
    public function edit(Karakter $karakter){
        return view('guru.karakter.form',['item'=>$karakter,'action'=>route('guru.karakter.update',$karakter),'method'=>'PUT','siswas'=>Siswa::all(),'aspekList'=>self::ASPEK]);
    }
    public function update(Request $r, Karakter $karakter){
        $v=$r->validate([
            'siswa_id'=>'required|exists:siswas,id',
            'aspek'=>'required|in:Disiplin,Jujur,Tanggung Jawab,Santun,Kerjasama,Percaya Diri',
            'nilai'=>'required|in:A,B,C,D',
            'tanggal'=>'required|date',
        ]);
        $karakter->update($v);
        return redirect()->route('guru.karakter.index')->with('ok','Karakter diupdate');
    }
    public function destroy(Karakter $karakter){ $karakter->delete(); return back()->with('ok','Karakter dihapus'); }
}
