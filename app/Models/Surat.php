<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Surat extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'd_surat';

    protected $fillable = [
        'no_surat', 'tanggal_surat', 'perihal', 'status', 'nip_user'
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
