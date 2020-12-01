<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\historique;
use DB;

class fichejrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $page_name = 'fiche journaliere';
        $users = DB::table('users')->get();
        return view('admin.journal', compact('page_name', 'users'));
    }

    public function status($id){
        $employer=user::find($id);
        if($employer->type===1){
            $employer->type=0;
        }else{
            $employer->type=1;
        }
        $employer->save();

            $empl =  new historique();
            $empl->user_id = $id;
            $empl->date_jr = carbon::now();
            $empl->statut =  $employer->type;
            $empl->save();
        
            return redirect()->route('fiche-list',['id'=>$employer->id]);
        }


        public function list()
        {
            $datas = DB::table('historiques')
            ->join('users', 'historiques.user_id', '=', 'users.id')
            ->get();

            return view('admin.presence', compact('datas'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
