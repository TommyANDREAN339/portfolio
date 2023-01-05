<?php

namespace App\Http\Controllers;

use App\Models\Leape;
use Illuminate\Http\Request;

class AdminLeapeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.leapes.index', [
            'leapes' => Leape::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.leapes.create', [
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
           'name' => 'required|min:5|max:255',
           'slug' => 'required|unique:leapes'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Leape::create($validatedData);

        return redirect('/dashboard/leapes')->with('success', 'new adding had been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leape  $leape
     * @return \Illuminate\Http\Response
     */
    public function show(Leape $leape)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leape  $leape
     * @return \Illuminate\Http\Response
     */
    public function edit(Leape $leape)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leape  $leape
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leape $leape)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leape  $leape
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leape $leape)
    {
        //
    }
}
