<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Hafalan extends Model {
    protected $table='hafalan';
    protected $fillable=['siswa_id','jenis_hafalan','surat','progress','audio','tanggal'];
    protected $casts=['tanggal'=>'date'];
    public function siswa(): BelongsTo { return $this->belongsTo(Siswa::class); }
    public function updateProgress(int $p): void { $this->update(['progress'=>$p]); }
}
