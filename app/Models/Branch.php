<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function parts() {
        return $this->hasMany(Part::class);
    }

    public function employees() {
        return $this->hasMany(Employee::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
