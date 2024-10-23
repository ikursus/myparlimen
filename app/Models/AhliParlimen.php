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

    // Relation table ahli_parlimen dengan table jawatan
    // hubungannya adalah one to one
    public function relationJawatan()
    {
        return $this->belongsTo(Jawatan::class, 'jawatan_id', 'id');
    }

    // Relation table ahli_parlimen dengan table gelaran
    // hubungannya adalah one to one
    public function relationGelaran()
    {
        return $this->belongsTo(Gelaran::class, 'gelaran_id', 'id');
    }

    // Relation table ahli_parlimen dengan table parti
    // hubungannya adalah one to one
    public function relationParti()
    {
        return $this->belongsTo(Parti::class, 'parti_id', 'id');
    }
}
