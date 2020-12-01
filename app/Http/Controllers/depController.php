<?php

namespace App\Http\Controllers;

use App\departement;
use Illuminate\Http\Request;

class depController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'departement';
        return view('admin.departement.list', compact('page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'enregistrement departement';
        return view('admin.departement.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        departement::create($request->All());
        return redirect()->action('depController@index')->with('success','departement enregistré avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function edit(departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(departement $departement)
    {
        //
    }
}
