<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Nilai extends Model {
    protected $table='nilai';
    protected $fillable=['siswa_id','mata_pelajaran_id','nilai_angka','nilai_huruf','semester'];
    public function siswa(): BelongsTo { return $this->belongsTo(Siswa::class); }
    public function mataPelajaran(): BelongsTo { return $this->belongsTo(MataPelajaran::class,'mata_pelajaran_id'); }
    public function hitungHuruf(): string {
        return match(true){ $this->nilai_angka>=90=>'A', $this->nilai_angka>=75=>'B', default=>'C' };
    }
    protected static function booted(){ static::saving(function($m){ if(!$m->nilai_huruf) $m->nilai_huruf=match(true){$m->nilai_angka>=90=>'A',$m->nilai_angka>=75=>'B',default=>'C'}; }); }
}
