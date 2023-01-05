<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Branch;
use App\Models\Organisation;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index() {

        $title = '';
        if(request('organisation')) {
        $organisation = Organisation::firstWhere('slug' , request('organisation'));
        $title = "in" . $organisation->name;
    }

        $title = '';
        if(request('branch')) {
        $branch = Branch::firstWhere('slug' , request('branch'));
        $title = "in" . $branch->name;
    }
        
    


        return view('parts',[
            'title' => 'Parts',
            'parts' => Part::latest()->filter(request(['branch', 'organisation']))->paginate(12)->withQueryString(),
            'active' => 'part'
        ]);
    }

    public function show(Part $part) {
        return view('part', [
             'title' => 'Single Part',
             'active' => 'part',
             'part' => $part
        ]);
    }
}
