<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Leape;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index() {

        $title = '';
        if(request('user')) {
        $user = User::firstWhere('username', request('user'));
        $title = "in" . $user->name;
        } 
        
        $title = '';
        if(request('leape')) {
        $leape = Leape::firstWhere('slug', request('leape'));
        $title = "in" . $leape->name;
        } 

        
        
        return view('leaves', [
           "title" => "Leaves",
           "active" => "leaves",
           "leaves" => Leave::latest()->filter(request(['user', 'leape']))->
           paginate(12)->withQueryString()
        ]);
    }

    public function show(Leave $leave) {
        return view('leave' , [
           'title' => 'single Leave',
           'active' => 'leave',
           'leave' => $leave
        ]);
    }
}
