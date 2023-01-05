<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Unit;
use App\Models\Pattern;
use App\Models\Position;
use Illuminate\Support\Str;
use App\Models\Organisation;
use Illuminate\Http\Request;


class DashboardPatternController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.patterns.index', [
            'patterns' => Pattern::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.patterns.create', [
            'cities' => City::all(),
            'organisations' => Organisation::all(),
            'units' => Unit::all(),
            'positions' => Position::all()
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
           'title' => 'required|min:5',
           'slug' => 'required|unique:patterns',
           'city_id' => 'required',
           'organisation_id' => 'required',
           'unit_id' => 'required',
           'position_id' => 'required',
           'body' => 'required',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),200);
        
        Pattern::create($validatedData);

        return redirect('/dashboard/patterns')->with('success', 'New Pattern has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function show(Pattern $pattern)
    {
        return view('dashboard.patterns.show' , [
            'pattern' => $pattern
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function edit(Pattern $pattern)
    {
        return view('dashboard.patterns.edit', [
           'pattern' => $pattern,
           'cities' => City::all(),
           'organisations' => Organisation::all(),
           'units' => Unit::all(),
           'positions' => Position::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pattern $pattern)
    {
        $rules = [
           'title' => 'required|min:5|max:255',
           'city_id' => 'required',
           'organisation_id' => 'required',
           'unit_id' => 'required',
           'position_id' => 'required',
           'body' => 'required',
        ];
        
        if($request->slug != $pattern->slug) {
           $rules['slug'] = 'required|unique:patterns'; 
        }

        $validatedData = $request->validate($rules);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body),100);

        Pattern::where('id', $pattern->id)->update($validatedData);

        return redirect('/dashboard/patterns')->with('success', 'patterns had been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pattern  $pattern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pattern $pattern)
    {
        Pattern::destroy($pattern->id);

        return redirect('/dashboard/patterns')->with('success','pattern had been deleted');
    }
}
