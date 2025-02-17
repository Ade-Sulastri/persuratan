<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 't_user'; // Gunakan tabel 't_user'
    protected $primaryKey = 'nip'; // Set primary key ke 'nip'
    public $incrementing = false; // Karena nip bukan auto-increment
    protected $keyType = 'int'; // Sesuai dengan tipe data BIGINT
    protected $fillable = [
        'nip',
        'username',
        'email',
        'password',
        'tanggal_aktif',
        'tanggal_nonaktif',
        'status',
        'kode_satker',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'nip'; // Pastikan nip digunakan sebagai identifier
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function surat(): HasMany
    {
        return $this->hasMany(Surat::class);
    }
}
