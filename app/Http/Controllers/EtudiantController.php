<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{ 
    public function page(){
    $etudiants = Etudiant::select()
    ->orderBy('nom')
    ->paginate(25);
    return view('etudiant.page', ['etudiants' => $etudiants]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudiant.create', ['villes' => $villes]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request, Etudiant $etudiant, User $user)
    {
        $request->validate([
            'nom' => 'required|min:2',
            'email' => 'required|email',
            'password' => [
                'required',
                'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
            ],
            'date_naissance' => 'required',
            'adresse' => 'required',
            'phone' => 'required'
        ]);

        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
     
        $etudiant = Etudiant::create([
            'id' => $user->id,
            'nom' => $request->nom , 
            'date_naissance' => $request->date_naissance , 
            'adresse' => $request->adresse , 
            'phone' => $request->phone , 
            'email' => $request->email , 
            'ville_id' => $request->ville
        ]);
    
        return redirect(route('etudiant.page'))->withSuccess(__('lang.text_ajout'));
    }

    

    
      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiant.show', ['etudiant' => $etudiant]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([
            'nom' => $request->nom, 
            'date_naissance' => $request->date_naissance, 
            'adresse' => $request->adresse, 
            'phone' => $request->phone, 
            'email' => $request->email, 
            'ville_id' => $request->ville
        ]);
        $etudiantNom = $request->nom;
        return redirect(route('etudiant.page'))->withSuccess(__('lang.text_db_mod'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        Auth::logout();
        session()->forget('auth');
        session()->forget('auth_id');
        return redirect(route('etudiant.page'))->withSuccess(__('lang.text_db_supp'));
    }

}
