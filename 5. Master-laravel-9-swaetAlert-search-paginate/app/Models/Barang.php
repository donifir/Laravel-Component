<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function supliers()
    // {
    //     return $this->hasMany(Suplier::class);
    // }

    public function suplier()
    {
        return $this->belongsTo(Suplier::class);
    }

    public function shouldBeSearchable()
    {
        return $this->isPublished();
    }
}
