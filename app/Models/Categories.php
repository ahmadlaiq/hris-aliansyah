<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    //has many
    public function letters()
    {
        return $this->hasMany(Letter::class);
    }
}
