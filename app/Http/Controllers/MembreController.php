<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Flasher\Prime\FlasherInterface;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membres = User::orderBy('nom')->get();
        return view('membre',compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-membre');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FlasherInterface $flasher)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'phone' => 'required|numeric|unique:users,phone,id',
            'email' => 'required|email',
            'adhesion' => 'nullable',
            // 'password' => 'required',
        ]);

            $default_pass = "@2022-2023";
           $user = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => "user",
                'date_adhesion' => Carbon::create($request->adhesion),
                'password' => Hash::make($default_pass),
            ]);
            if($user){
                $flasher->addSuccess('Membre ajouté avec succes');
                return redirect('membre');
            }

            $flasher->addError('Une erreur est survenue: ' . $e->getMessage());
            return redirect()->back()->withErrors([
                'adhesion' => 'Une erreur est survenue',
            ]);
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
