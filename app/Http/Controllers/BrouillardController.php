<?php

namespace App\Http\Controllers;

use App\Models\Brouillard;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class BrouillardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brouillard = Brouillard::orderBy('created_at','DESC')->get();
        $solde = $brouillard->first() ? $brouillard->first()->solde : 0;
        return view('brouillard',compact('brouillard','solde'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-brouillard');
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
            'type' => 'required',
            'montant' => 'required',
            'designation' => 'required',
        ]);

            $last = Brouillard::orderBy('created_at','desc')->first();
            $solde_initial = $last ? $last->solde : 0;
            if($request->type=='entrée'){
                $montant = $request->montant;
            } else {
                $montant = -$request->montant;
            }
            $mandat = getMandat();
            $brouillard = Brouillard::create([
                'solde_initial' => $solde_initial,
                'designation' => $request->designation,
                'montant' => $montant,
                'type' => $request->type,
                'solde' => $solde_initial+$montant,
                'mandat_id' => $mandat->id,
                'admin_id' => 1
            ]);

            if($brouillard){
                $flasher->addSuccess('Pièce enregistré');
                return redirect('brouillard');
            }

        $flasher->addError('Une erreur est survenue: ' . $e->getMessage());
        return redirect()->back()->withErrors([
            'designation' => 'Une erreur est survenue',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brouillard  $brouillard
     * @return \Illuminate\Http\Response
     */
    public function show(Brouillard $brouillard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brouillard  $brouillard
     * @return \Illuminate\Http\Response
     */
    public function edit(Brouillard $brouillard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brouillard  $brouillard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brouillard $brouillard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brouillard  $brouillard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brouillard $brouillard)
    {
        //
    }
}
