<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 't_user';
    protected $primaryKey = 'nip';
    public $incrementing = false;

    protected $fillable = [
        'nip', 'username', 'email', 'kode_satker', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isSupervisor()
    {
        return $this->role === 's';
    }

    public function isOperator()
    {
        return $this->role === 'o';
    }

    public function isSuperAdmin() {
        return $this->role === 'S';
    }

    public function getAuthIdentifierName()
    {
        return 'nip'; // Menggunakan nip sebagai identifier
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function surat(): HasMany {
        return $this->hasMany(Surat::class);
    }
}
