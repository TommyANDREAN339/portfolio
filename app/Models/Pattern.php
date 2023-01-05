<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pattern extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters) {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
             $query->where('title' , 'like' , '%' . $search  . '%' )
                  ->orWhere('body' , 'like' , '%' . $search . '%' );
            });
         });

        $query->when($filters['city'] ?? false ,  function($query , $city) {
          return $query->wherehas('city', function($query) use ($city) {
             $query->where('slug', $city);
         });
        });

        $query->when($filters['organisation'] ?? false , function($query , $organisation) {
           return $query->whereHas('organisation', function($query) use ($organisation) {
                  $query->where('slug', $organisation);
          });
        });

        $query->when($filters['unit'] ?? false , function($query, $unit) {
           return  $query->whereHas('unit', function($query) use ($unit) {
                $query->where('slug', $unit);
           });
        });
        $query->when($filters['position'] ?? false , function($query, $position) {
           return $query->whereHas('position', function($query) use ($position) {
                $query->where('slug', $position);
           });
        });
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function organisation() {
        return $this->belongsTo(Organisation::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
