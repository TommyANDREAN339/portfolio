<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Employee;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.employees.index', [
           'employees' => Employee::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.employees.create', [
             'branches' => Branch::all(),
             'providers' => Provider::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'title' => 'required|min:5|max:255',
           'slug' => 'required|unique:employees',
           'NIK' => 'required',
           'NIP' => 'required',
           'branch_id' => 'required',
           'provider_id' => 'required',
           'body' => "required"
        ]);
  
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),200);

        Employee::create($validatedData);

        return redirect('/dashboard/employees')->with('success', 'New addings has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('dashboard.employees.show', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('dashboard.employees.edit', [
           'employee' => $employee,
           'branches' => Branch::all(),
           'providers' => Provider::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $rule = [
            'title' => 'required|max:255',
            'NIK' => 'required',
            'NIP' => 'required',
            'branch_id' => 'required',
            'provider_id' => 'required',
            'body' => 'required'
         ];

         if($request->slug != $employee->slug) {
            $rule['slug'] = 'required|unique:employees';
         }

         $validatedData = $request->validate($rule);

         $validatedData['user_id'] = auth()->user()->id;
         $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 6);

         Employee::where('id', $employee->id)->update($validatedData);

        return redirect('/dashboard/employees')->with('success', 'employee has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);

        return redirect('/dashboard/employees');
    }
}
