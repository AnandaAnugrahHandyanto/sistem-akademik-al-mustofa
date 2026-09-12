<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class CatatanGuru extends Model {
    protected $table='catatan_guru';
    protected $fillable=['siswa_id','guru_id','catatan','tanggal'];
    protected $casts=['tanggal'=>'date'];
    public function siswa(): BelongsTo { return $this->belongsTo(Siswa::class); }
    public function guru(): BelongsTo { return $this->belongsTo(Guru::class); }
}
