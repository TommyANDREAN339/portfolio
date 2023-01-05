<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class AdminOrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.organisations.index' , [
          'organisations' => Organisation::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.organisations.create', [
           'organisations' => Organisation::all()
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
           'name' => "required|max:255",
           'slug' => "required|unique:organisations"
        ]);

        Organisation::create($validatedData);

        return redirect('/dashboard/organisations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        return view('dashboard.organisations.show', [
            'organisation' => $organisation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisation  $organisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //
    }
}
