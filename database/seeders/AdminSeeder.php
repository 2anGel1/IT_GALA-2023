<?php

namespace Database\Seeders;

use App\Models\Gala;
use App\Models\TypeTicket;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gala = Gala::create([
            'annee' => '2022-2023',
            'nomPco1' => 'Atta Adjoumani',
            'nomPco2' => 'Brye Oceanne',
            'nbPlace' => 200
        ]);


        $role = Role::create(['name'=> 'Super@Administrateur']);
        $user1 = User::create([
            'name' => 'Super@dministrateur',
            'email' => 'adminGala@C2E.com',
            'password' => Hash::make("@Gala@2k22@"),
            'isAdmin' => true
        ]);


        $user1->assignRole('Super@Administrateur');

        Role::create(['name'=> 'Administrateur']);

        //caissière
        Role::create(['name'=> 'Caissiere']);
        Role::create(['name'=> 'Controlleur']);
        Role::create(['name'=> 'participant']);

        // Permission::create(['name' => 'restaurant']);
        // Permission::create(['name' => 'comite nuit']);
        // Permission::create(['name' => 'hackaton']);


        // $user = User::create([
        //     'name' => '@dministrateur',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $user->assignRole('Super@Administrateur') ;

        // $caissiere1 = User::create([
        //     'name' => '@Caissiere',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $caissiere1->assignRole('Caissiere') ;

        // $participant1 = User::create([
        //     'name' => '@Participant',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $participant1->assignRole('participant') ;

        // $controller1 = User::create([
        //     'name' => '@Controlleur',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);

        Role::create(['name'=> 'Administrateur']);
        //caissière
        Role::create(['name'=> 'Caissiere']);
        Role::create(['name'=> 'Controlleur']);
        Role::create(['name'=> 'participant']);

        // Permission::create(['name' => 'restaurant']);
        // Permission::create(['name' => 'comite nuit']);
        // Permission::create(['name' => 'hackaton']);


        // $user = User::create([
        //     'name' => '@dmin.istrateur',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $user->assignRole('Super@Administrateur') ;

        // $caissiere1 = User::create([
        //     'name' => '@Caissiere',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $caissiere1->assignRole('Caissiere') ;

        // $participant1 = User::create([
        //     'name' => '@Participant',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $participant1->assignRole('participant') ;

        // $controller1 = User::create([
        //     'name' => '@Controlleur',
        //     'email' => 'adminGala@C2E.com',
        //     'password' => Hash::make("@Gala@2k22@"),
        //     'isAdmin' => true
        // ]);


        // $controller1->assignRole('Controlleur') ;

        // $controller1->assignRole('Controlleur') ;

        TypeTicket::create([
            'libelle' => 'solo interne',
            'prix' => 15000,
            'gala_id' => $gala->id
        ]);

        TypeTicket::create([
            'libelle' => 'solo externe',
            'prix' => 15000,
            'gala_id' => $gala->id
        ]);

        // TypeTicket::create([
        //     'libelle' => 'couple interne',
        //     'prix' => 35000,
        //     'gala_id' => $gala->id
        // ]);

        // TypeTicket::create([
        //     'libelle' => 'couple mixte',
        //     'prix' => 40000,
        //     'gala_id' => $gala->id
        // ]);

        // TypeTicket::create([
        //     'libelle' => 'couple externe',
        //     'prix' => 40000,
        //     'gala_id' => $gala->id
        // ]);

        // TypeTicket::create([
        //     'libelle' => 'duo interne',
        //     'prix' => 35000,
        //     'gala_id' => $gala->id
        // ]);
/*
        TypeTicket::create([
            'libelle' => 'duo interne',
            'prix' => 35000,
            'gala_id' => $gala->id
        ]); */

    }
}
