<!DOCTYPE html>
<html>

<head>
    <title>Liste des groupes </title>

    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;

            box-shadow: 0 0 20px rgba(59, 57, 57, 0.15);
        }

        .styled-table thead tr {
            background-color: black;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
            text-align: left;

        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #0f0f0f;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #031612;
        }

        /*
        les cadres oh
        */

        .business-3 {
            padding: 30px 0px;
            display: table;
        }

        .card {

            width: 31%;

            display: inline-block;
            border-radius: 10px;
            bo margin: 0px 1%;
        }

        .card-div {
            padding: 10px;
        }

        .card-div-2 {
            text-align: center;
        }

        .card-div-1 {
            text-align: right;
        }


        /**/

        table,
        td {
            border: 1px solid black;
        }

        td {
            padding: 10px 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;

        }
    </style>

</head>

<body>

    <div style="display:flex;width:100%;">

        <div style=" width:48%; display:inline-block;">

            <img alt="Logo C2E " src="logo_c2e.jpeg" style="height: 80px; width:130px" />

        </div>

        <div style=" width:48%;text-align:right; display:inline-block;">

            <img alt="Logo du gala" src="img/gala ed 1.png" style="height: 120px; width:130px" />

        </div>

    </div>

    <div style="margin:30px 0px; text-align:center; width:100% ;">
        <span style="font-size:20px; font-weight:bold"> Liste des groupes pour l' IT GALA 2023 </span>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th> Noms des groupes </th>
                <th> Noms et prénoms des personnes </th>
            </tr>
        </thead>

        @php
            $i = 1
        @endphp
        @foreach ($groupes as $groupe)
            <tr>
                <td>
                    {{ $i++ }}
                </td>

                <td>
                    {{ $groupe->libelle }}
                </td>

                <td>

                    <ul>
                    @foreach ($groupe->tickets as $ticket)
                    <li>{{ $ticket->personne->nom }} {{ $ticket->personne->prenom }}</li>
                    @endforeach
                </ul>
                </td>
            </tr>
        @endforeach

    </table>


    <p>
        Fait à Abidjan le {{ $date }} fournit par l'administrateur de la plate-forme AMANGOUA KOUASSI.
    </p>

</body>

</html>
