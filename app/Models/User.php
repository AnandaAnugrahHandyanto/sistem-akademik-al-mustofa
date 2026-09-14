<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'siswa_id', 'guru_id',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function siswa(): BelongsTo { return $this->belongsTo(Siswa::class); }
    public function guru(): BelongsTo { return $this->belongsTo(Guru::class); }

    public function hasRole(string|array $role): bool
    {
        return is_array($role) ? in_array($this->role, $role) : $this->role === $role;
    }
}
