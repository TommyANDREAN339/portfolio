<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Unit;
use App\Models\Pattern;
use App\Models\Position;
use App\Models\Organisation;
use Illuminate\Http\Request;

class PatternController extends Controller
{
    public function index() {
       
        $title = '';
        if(request('city')) {
            $city = City::firstWhere('slug', request('city'));
            $title = 'in' . $city->name;
        }

        $title = '';
        if(request('organisation')) {
            $organisation = Organisation::firstWhere('slug', request('organisation'));
            $title = 'in' . $organisation->name;
        }

        $title = '';
        if(request('unit')) {
            $unit = Unit::firstWhere('slug', request('unit'));
            $title = "in" . $unit->name;      
        }

        $title = '';
        if(request('position')) {
            $position = Position::firstWhere('slug', request('position'));
            $title = "in" . $position->name;      
        }

        return view('patterns', [
           'title' => 'Patterns',
           'active' => 'pattern',
           'patterns' => Pattern::latest()->filter(request(['city', 'organisation' , 'unit' , 'position']))->paginate(12)->withQueryString()
        ]);
    }

    public function show(Pattern $pattern) {
        return view('pattern', [
            'title' => 'single pattern',
            'active' => 'pattern', 
            'pattern' => $pattern
        ]);
    }
}
