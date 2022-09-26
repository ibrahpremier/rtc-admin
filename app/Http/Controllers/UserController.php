<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Flasher\Prime\FlasherInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{  
    
    /**
    * Handle an authentication attempt.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function login(Request $request, FlasherInterface $flasher)
   {
       $credentials = $request->validate([
           'phone' => ['required', 'numeric'],
           'password' => ['required'],
       ]);

       if (Auth::attempt($credentials)) {
           
           if(Auth::user()->getUser()->role=='admin'){
                $request->session()->regenerate();
                  return redirect()->intended('/');
           }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back()->withErrors([
            "password" => "Vous n'êtes pas autorisé",
        ]);
       }

       $flasher->addError('Les informations de connexions ne sont pas valides');

       return redirect()->back()->withErrors([
           'password' => 'Les details de connexions ne sont pas valides',
       ]);
    //    return redirect()->back()->withErrors('Les details de connexions ne sont pas valides');

   }

   function register(Request $request, FlasherInterface $flasher)
   {
       $request->validate([
           'nom' => 'required',
           'prenom' => 'required',
           'phone' => 'required|numeric',
           'email' => 'required|email',
           'password' => 'required'
        ]);

       User::create([
        'nom' =>$request->nom,
        'prenom' =>$request->prenom,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);
      $flasher->addSuccess('Utilisateur créé. Veuillez vous connecter');

      return redirect()->intended('login');
   }

   function disconnect(Request $request, FlasherInterface $flasher)
   {
    //    Helpers::SaveLog('Deconexion à GED',Auth::user()->id);
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       $flasher->addSuccess('Vous avez été déconnecté');
       return redirect('/login');
   }
   
}


