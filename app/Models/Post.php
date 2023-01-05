<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
     

    public function scopeFilter($query, array $filters) {
        
        $query->when($filters['search'] ?? false, function($query, $search) {
           return $query->where(function($query) use ($search) {
            $query->where('title' , 'like' , '%' . $search  . '%' )
                 ->orWhere('body' , 'like' , '%' . $search . '%' );
           });
        });
        
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
              $query->where('slug', $category);
            });
        });

        $query->when($filters['user'] ?? false, function($query, $user) {
           return $query->whereHas('user', function($query) use ($user) {
             $query->Where('username', $user);
           });
        });
        $query->when($filters['city'] ?? false, function($query, $city) {
           return $query->whereHas('city', function($query) use ($city) {
             $query->Where('slug', $city);
           });
        });
        $query->when($filters['provider2'] ?? false, function($query, $provider2) {
           return $query->whereHas('provider2', function($query) use ($provider2) {
             $query->Where('slug', $provider2);
           });
        });

    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
 
    public function user() {
        return $this->belongsTo(User::class);
    }    

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function provider2() {
        return $this->belongsTo(Provider2::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
 
