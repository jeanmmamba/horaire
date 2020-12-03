<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
use App\Role;
use DB;

class amployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'liste des employés';
        $users = DB::table('users')->get();
      
        return view('admin.employe.list',compact('users','page_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = 'enregistrement employer';
        $roles=Role::pluck('name','id');
        return view('admin.employe.create',compact('page_name','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',

        ],[
            'name.required' => "Name field is required",
            'email.email' => "Invalid Email Format ",
            'email.unique' => "User Email Already Exist"

        ]);

        $employer = new User();
        $employer->name = $request->name;
        $employer->prenom = $request->prenom;
        $employer->departement = $request->departement;
        $employer->fonction = $request->fonction;
        $employer->matricule = '00DA';
        $employer->email = $request->email;
        $employer->password=HASH::make($request->password);
        $employer->type = 0;
        $employer->save();
    
        foreach ($request->role as $value) {
            $author->attachrole($value);
         }

    return redirect()->action('amployerController@index')->with('success','employer enregistrer avec succes');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, employe $employe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(employe $employe)
    {
        //
    }
}
