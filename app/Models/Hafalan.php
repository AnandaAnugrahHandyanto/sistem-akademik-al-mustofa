<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Hafalan extends Model {
    protected $table='hafalan';
    protected $fillable=['siswa_id','jenis_hafalan','surat','ayat_mulai','ayat_selesai','total_ayat','status','progress','audio','tanggal'];
    protected $casts=['tanggal'=>'date','ayat_mulai'=>'integer','ayat_selesai'=>'integer','total_ayat'=>'integer'];
    public function siswa(): BelongsTo { return $this->belongsTo(Siswa::class); }
    public function updateProgress(int $p): void { $this->update(['progress'=>$p]); }
    // helper: auto-calc progress from ayat range
    public static function calcProgress(?int $mulai, ?int $selesai, ?int $total): ?int {
        if($mulai && $selesai && $total && $total>0 && $selesai >= $mulai){
            $n = $selesai - $mulai + 1;
            return (int) min(100, round($n / $total * 100));
        }
        return null;
    }
}
