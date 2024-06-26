<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function kategori_loker()
    {
        return $this->belongsTo(KategoriLoker::class, 'kategori_id');
    }
}
