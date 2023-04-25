<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ConvertEtudiantsToUsers extends Migration
{
    public function up()
    {

        // Migrate the data from etudiants to users
        $etudiants = DB::table('etudiants')->get();

        foreach ($etudiants as $etudiant) {
            DB::table('users')->insert([
                'id' => $etudiant->id,
                'name' => $etudiant->nom,
                'email' => $etudiant->email,
                'password' => bcrypt('pass1234'),
            ]);
        }
    }

    public function down()
    {
        // Drop the users table
        Schema::dropIfExists('users');
    }
}
