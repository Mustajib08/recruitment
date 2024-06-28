<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyNow extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public function loker()
    {
        return $this->belongsTo(Loker::class, 'loker_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
