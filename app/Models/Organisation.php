<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function parts() {
       return $this->hasMany(Part::class);
    }

    public function patterns() {
        return $this->hasMany(Pattern::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
