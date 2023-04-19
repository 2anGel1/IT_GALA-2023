<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Gala;
use App\Models\Groupe;
use App\Models\Ticket;
use App\Models\Vote;
use PDF;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    public function exportPdfListe()
    {

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        $tickets = Ticket::where('gala_id', $gala->id)->get() ;

        $data = [
            'title' => 'IT GALA 2022',
            'date' => date('d-m-Y à h:i:s A'),
            'tickets' => $tickets

        ];



        $pdf = PDF::loadView('pdf.listes', $data)->setPaper('a4', 'landscape');

        // return $pdf->download('listeEquipes.pdf');

        return $pdf->stream('ListeParticipants.pdf');
    }

    public function exportPdfGroupe()
    {

        $groupes = Groupe::all() ;

        $data = [
            'title' => 'IT GALA 2023',
            'date' => date('d-m-Y à h:i:s A'),
            'groupes' => $groupes

        ];



        $pdf = PDF::loadView('pdf.groupes', $data)->setPaper('a4', 'landscape');

        // return $pdf->download('listeEquipes.pdf');

        return $pdf->stream('ListeGroupes.pdf');
    }


    public function exportAwardPDF()
    {

        $gala = Gala::orderBy('created_at', 'DESC')->first() ;

        $categories = Categorie::where('gala_id', $gala->id)->get();

        $data = [
            'title' => 'IT GALA 2022',
            'date' => date('d-m-Y à h:i:s A'),
            'categories' => $categories

        ];



        $pdf = PDF::loadView('pdf.awardWinners', $data) ; //->setPaper('a4', 'landscape');

        // return $pdf->download('listeEquipes.pdf');

        return $pdf->stream('ListeNomines.pdf');


    }
}
