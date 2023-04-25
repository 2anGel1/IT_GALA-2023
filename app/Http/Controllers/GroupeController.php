<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use App\Models\Personne;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'libelle' => 'required|unique:groupes,libelle'
        ]);

        $groupe = new Groupe();
        $groupe->libelle = $request->libelle;
        $groupe->save();

        if (isset($request->tickets)) {
            foreach ($request->tickets as $ticket_id) {
                $ticket = Ticket::find($ticket_id);
                $ticket->groupe_id = $groupe->id;
                $ticket->save();
                $groupe->nbPersonnes += 1;
            }
        }
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
        if ($groupe) {
            return view('admin.tickets.groupe.show', compact('groupe'));
        }else {
            session()->flash('Warning', 'Groupe non existant !');
            return redirect()->back();
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
        $groupe = Groupe::find($id);
        if ($groupe) {
            return view('admin.tickets.groupe.edit', compact('groupe'));
        }else {
            session()->flash('Warning', 'Groupe non existant !');
            return redirect()->back();
        }
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
        $request->validate([
            'libelle' => ['required', Rule::unique('groupes', 'libelle')->ignore($id)]
        ]);

        $groupe = Groupe::find($id);
        if (isset($request->toDelete)) {
            foreach ($request->toDelete as $ticket_id) {
                $ticket = Ticket::find($ticket_id);
                $ticket->groupe_id = null;
                $ticket->save();
                $groupe->nbPersonnes -= 1;
            }
        }

        $groupe->libelle = $request->libelle;

        if (isset($request->tickets)) {
            foreach ($request->tickets as $ticket_id) {
                $ticket = Ticket::find($ticket_id);
                $ticket->groupe_id = $groupe->id;
                $ticket->save();
                $groupe->nbPersonnes += 1;
            }
        }
        $groupe->save();

        session()->flash('success', 'Groupe modifié avec success.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupe = Groupe::find($id);
        if ($groupe) {
            foreach ($groupe->tickets as $ticket) {
                $ticket->groupe_id = null;
                $ticket->save();
            }
            $groupe->delete();
            session()->flash('success', 'Groupe supprimé avec success.');
            return redirect()->back();
        } else {
            session()->flash('Warning', 'Groupe non existant !');
            return redirect()->back();
        }
    }

    public function searchTickets(Request $request)
    {
        $tickets = [];
        if ($request->has('q') and $request->q != null) {
            // if (true) {
            $search = $request->q;
            $tickets = Ticket::join('personnes', 'tickets.personne_id', '=', 'personnes.id')
                ->select('tickets.id', 'tickets.code', 'personnes.matricule', 'personnes.nom', 'personnes.prenom')
                ->whereNull('tickets.groupe_id')
                ->where(function ($query) use ($search) {
                    $query->where('personnes.matricule', 'LIKE', "%$search%")
                        ->orWhere('personnes.nom', 'LIKE', "%$search%")
                        ->orWhere('personnes.prenom', 'LIKE', "%$search%");
                })
                ->get();
        }
        return response()->json($tickets);
    }
}
