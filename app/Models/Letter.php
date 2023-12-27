<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //belong to
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categori()
    {
        return $this->belongsTo(Categories::class);
    }
}
