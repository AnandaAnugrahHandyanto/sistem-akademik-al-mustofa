<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Karakter extends Model {
    protected $table='karakter';
    protected $fillable=['siswa_id','aspek','nilai','tanggal'];
    protected $casts=['tanggal'=>'date'];
    public function siswa(): BelongsTo { return $this->belongsTo(Siswa::class); }
    public function rekapKarakter(){ return $this->where('siswa_id',$this->siswa_id)->pluck('nilai','aspek'); }
}
