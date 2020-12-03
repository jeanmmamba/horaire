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

    
    public function index_hist()
    {
        $datas = DB::table('historiques')
        ->join('users', 'historiques.user_id', '=', 'users.id')
        ->get();

        return view('admin.presence', compact('datas'));
    }


    public function status($id){
        $employer=user::find($id);
        if($employer->type===1){
            $employer->type=0;
        }else{
            $employer->type=1;
        }
        $employer->save();

<<<<<<< HEAD
            $empl =  new historique();
            $empl->user_id = $id;
            $empl->hr_arrive = null;
            $empl->hr_depart = null;
            $empl->save();
        
            return redirect()->route('fiche-list',['id'=>$employer->id]);
        }

=======
        $empl =  new historique();
        $empl->user_id = $id;
        $empl->date_jr = carbon::now();
        $empl->statut =  $employer->type;
        $empl->save();
    
        return redirect()->route('fiche-list',['id'=>$employer->id]);
    }
>>>>>>> 18ccd31828c65b7c800ca162c918bc18752d7a34


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
    public function store($id)
    {

        $employer=user::find($id);


        if($employer->type === 1){//si le user est absent
            $record = new historique();

            $record->user_id = $id;
            $record->date_jr = date('Y-m-d');
            $record->hr_arrive = date('H:i:s');
            $employer->type = 0;

            $record->save();
        }
        else{
            // il faut regarder la synthaxe du update set et le tour est jouer
            // Sauver record

            // $affected = DB::update('update users set votes = 100 where name = ?', ['John']);
            $record  = DB::update('update historiques set hr_depart = ? where user_id = ?', [date('H:i:s'), $id]);
            
            $employer->type = 1;
        }

        $employer->save();

        // La route traitant de l affichage de la liste doit etre retournée
        return redirect('/historique')->with('susses', 'Enregistrer');
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
