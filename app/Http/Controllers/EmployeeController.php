<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Provider;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {

       $title = '';
       if(request('provider')) {
       $provider = Provider::firstWhere('slug' , request('provider'));
       $title = "in" . $provider->name;
       }

       $title = '';
       if(request('branch')) {
       $branch = Branch::firstWhere('slug' , request('branch'));
       $title = "in" . $branch->name;
       }
       
       $title = '';
       if(request('user')) {
       $user = User::firstWhere('username' , request('user'));
       $title = "in" . $user->name;
       }

        return view('employees', [
          'title' => 'Employees',
          'active' => 'employee',
          'employees' => Employee::latest()->filter(request(['provider', 'branch', 'user']))->paginate(12)->withQueryString()
        ]);
    }

    public function show(Employee $employee) {
        return view('employee', [
            'title' => 'Single Employee',
            'active' => 'employee',
           'employee' => $employee
        ]);
    }
}
