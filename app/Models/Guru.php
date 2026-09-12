<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Guru extends Model {
    protected $fillable=['nip','nama_lengkap','email','no_hp'];
    public function mataPelajaran(): HasMany { return $this->hasMany(MataPelajaran::class); }
    public function catatanGuru(): HasMany { return $this->hasMany(CatatanGuru::class); }
    public function user() { return $this->hasOne(User::class); }
    public function inputNilai(array $data) { return Nilai::create($data); }
    public function inputHafalan(array $data) { return Hafalan::create($data); }
    public function inputKarakter(array $data) { return Karakter::create($data); }
}
