<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function jawaban()
    {
        return $this->hasOne(Jawaban::class, 'pertanyaan_id');
    }
}
