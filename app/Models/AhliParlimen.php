<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AhliParlimen extends Model
{
    protected $table = 'ahli_parlimen';

    protected $fillable = [
        'gelaran_id',
        'jawatan_id',
        'parti_id',
        'blok',
        'nama',
        'no_ic',
        'no_tel',
        'jantina',
        'email',
        'photo',
        'alamat',
        'status'
    ];
}
