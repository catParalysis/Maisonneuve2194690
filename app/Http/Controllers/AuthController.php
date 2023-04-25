<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Date;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    public function authentication(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

       if(!Auth::validate($credentials)):
            return redirect(route('login'))->withErrors(trans('auth.password'))->withInput();
       endif;

       $user = Auth::getProvider()->retrieveByCredentials($credentials);
     

       Auth::login($user);
       session()->start();
       session()->put('auth', $user->name);
       session()->put('auth_id', $user->id);

       return redirect()->intended(url('/'));

    }
    public function logout(){
        Auth::logout();
        session()->forget('auth');
        session()->forget('auth_id');
        return redirect(route('login'));
    }

}
