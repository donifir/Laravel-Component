<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    use HasFactory;

    public function user()
    {
        // return $this->belongsTo(User::class);
        // return $this->belongsTo(User::class, 'tes_id');
        return $this->belongsTo(User::class, 'id', 'tes_id');  //id adalah primary key asal tabel - 'tes id primary key tabel tujuan
    }
}
