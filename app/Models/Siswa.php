<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Siswa extends Model {
    protected $table='siswas';
    protected $fillable=['nis','nama_lengkap','kelas','rombel','jenis_kelamin'];
    public function nilai(): HasMany { return $this->hasMany(Nilai::class); }
    public function hafalan(): HasMany { return $this->hasMany(Hafalan::class); }
    public function karakter(): HasMany { return $this->hasMany(Karakter::class); }
    public function catatanGuru(): HasMany { return $this->hasMany(CatatanGuru::class); }
    public function user() { return $this->hasOne(User::class); }
    public function lihatNilai() { return $this->nilai; }
    public function lihatHafalan() { return $this->hafalan; }
}
