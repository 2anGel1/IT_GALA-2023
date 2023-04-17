<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Personne;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes = Groupe::all();
        return view('admin.tickets.groupe.index', compact('groupes'));
        // return view('admin.tickets.groupe.index', compact('personnes'));
    }

    // public function list()
    // {
    //     $groupes = Groupe::all();
    //     $nb_groupes = $groupes->count();
    //     return view('admin.tickets.groupe.list', compact(['groupes', 'nb_groupes']));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickets.groupe.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required'
        ]);

        $groupe = new Groupe();
        $groupe->libelle = $request->libelle;
        $groupe->save();
        session()->flash('success', 'Groupe enregistré avec success.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupe = Groupe::find($id);
        if($groupe){
            // return view()
            return '';
        }
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
