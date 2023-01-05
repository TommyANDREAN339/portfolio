<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function scopeFilter( $query, array $filters) {

       $query->when($filters['search'] ?? false , function( $query, $search ) {
           return $query->where(function($query) use ($search) {
               $query->where('title' , 'like' , '%' . $search . '%')
                   ->orWhere('body'  , 'like' , '%' . $search . '%');
            });
       });

       $query->when($filters['provider'] ?? false , function( $query, $provider) {
            return $query->whereHas('provider' , function($query) use ($provider) {
               $query->where('slug', $provider);
           });
       });
       
       $query->when($filters['branch'] ?? false , function( $query, $branch) {
            return $query->whereHas('branch' , function($query) use ($branch) {
               $query->where('slug', $branch);
           });
       });
       
       $query->when($filters['user'] ?? false , function( $query, $user) {
            return $query->whereHas('user' , function($query) use ($user) {
               $query->where('username', $user);
           });
       });
          
    } 

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
