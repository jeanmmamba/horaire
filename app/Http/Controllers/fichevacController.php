<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\vacance;
use App\user;

class fichevacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'planning de vacance';
        $datas = DB::table('vacances')
        ->join('users', 'vacances.user_id', '=', 'users.id')
        ->get();
        return view( 'admin.vacance',compact('datas','page_name'));
        
    }


    public function statut(request $request, $id){
        $employer=user::find($id);
        if($employer->type===1){
            $employer->type=0;
        }else{
            $employer->type=1;
        }
        $employer->save();

        if($employer->type===1){
                $page_name = 'congedier';
                $w=$employer->id;
                $l=$employer->name;
                $i=$employer->fonction;
            return view('admin.crevac', compact('page_name','i','l','w'));
        }else{
            vacance::where('id',$id)->delete();
        }

        return redirect()->route('employer-list',['id'=>$employer->id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function planif()
    {
        $page_name = 'planifier conger';
        $users = DB::table('users')->get();
        return view('admin.employe.list', compact('page_name','users'));
    }

    public function create()
    {

    }

    public function listing()
    {
        $page_name = 'liste des personnes en conger';
        $liste = DB::table('vacances')
        ->join('users', 'vacances.user_id', '=', 'users.id')
        ->get();
        return view('admin.listing',compact('liste','page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        
        $vac = new vacance();
        $vac->user_id= $id;
        $vac->debut= $request->debut;
        $vac->fin = $request->fin;
        $vac->motif = $request->motif;
        $vac->statut_vac = 0;
        $vac->save();

        return redirect()->action('fichevacController@listing');

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
