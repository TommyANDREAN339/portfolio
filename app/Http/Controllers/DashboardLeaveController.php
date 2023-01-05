<?php

namespace App\Http\Controllers;

use App\Models\Leape;
use App\Models\Leave;
use Illuminate\Http\Request;

class DashboardLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.leaves.index', [
            'leaves' => Leave::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.leaves.create', [
            'leapes' => Leape::all()
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
           'slug' => 'required|unique:leaves',
           'leape_id' => 'required'
            

        ]);

        $validatedData['user_id'] = auth()->user()->id;
   
        Leave::create($validatedData);

        return redirect('/dashboard/leaves')->with('success', 'new adding had been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        return view('dashboard.leaves.show', [
           'leave' => $leave
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        return view('dashboard.leaves.edit', [
            'leave' => $leave,
            'leapes' => Leape::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        $rules = [
           'title' => 'required|min:5|max:255',
           'leape_id' => 'required',
            
        ];

        if($request->slug != $leave->slug) {
            $rules['slug'] = 'required|unique:leaves';
        } 

        $validatedData = $request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;

        Leave::where('id', $leave->id)->update($validatedData);

        return redirect('/dashboard/leaves')->with('success','leave had been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        Leave::destroy($leave->id);

        return redirect('/dashboard/leaves')->with('success','leave had been deleted');
    }
}
