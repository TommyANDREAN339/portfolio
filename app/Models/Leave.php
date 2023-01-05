<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
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
   
        $query->when($filters['user'] ?? false , function( $query, $user) {
        return $query->whereHas('user' , function($query) use ($user) {
           $query->where('username', $user);
       });
   });

        $query->when($filters['leape'] ?? false , function( $query, $leape) {
        return $query->whereHas('leape' , function($query) use ($leape) {
           $query->where('slug', $leape);
       });
   });
}

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function leape() {
        return $this->belongsTo(Leape::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
