<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leape extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function leaves() {
        return $this->hasMany(Leave::class);
    }
}
