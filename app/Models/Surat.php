<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
