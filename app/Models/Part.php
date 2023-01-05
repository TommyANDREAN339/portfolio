<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    public function scopefilter( $query, array $filters) {
        
        $query->when($filters['search'] ?? false, function($query, $search) {
         return  $query->where(function($query) use ($search) {
            $query->where('title','like', '%' . $search . '%' )
                ->orwhere('body' ,'like', '%' . $search . '%' );
        });
    });

       $query->when($filters['organisation'] ?? false, function($query, $organisation) {
         return $query->whereHas('organisation', function($query) use ($organisation) {
           $query->where('slug', $organisation);
       });  
    });

    $query->when($filters['branch'] ?? false , function($query, $branch) {
        return $query->whereHas('branch', function($query) use ($branch) {
         $query->where('slug' , $branch);
      });  
    });

    }

    public function organisation() {
       return $this->belongsTo( Organisation::class );
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }


}
