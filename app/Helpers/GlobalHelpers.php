<?php

// namespace App\Helpers;
use Carbon\Carbon;
use App\Models\Mandat;
use Illuminate\Support\Facades\Auth;

// class GlobalHelpers
// {
     function formatDate(string $date)
    {
        $annee = substr($date,0,4);
        $mois = substr($date,4,2);
        $jour = substr($date,6,2);
        return $jour.'/'.$mois.'/'.$annee;
    }

     function formatDate2(string $date)
    {
        $annee = substr($date,0,4);
        $mois = substr($date,4,2);
        return $mois.'/'.$annee;
    }


    function getLoggedUser()
    {
        return Auth::user()->getUser();
    }



     function getToday()
    {
        return Carbon::now()->format('Y/m/d');
    }

     function getMandat()
    {
        //Creation automatique du mandat en cours si innexistant
        $mois = intval(Carbon::now()->format('m'));
        if($mois>6){
            $mandat = Mandat::where('annee_debut',intval(Carbon::now()->format('Y')))->first();
            if(!$mandat){
               $mandat = Mandat::create([
                    "annee_debut"=>intval(Carbon::now()->format('Y')),
                    "annee_fin"=>intval(Carbon::now()->format('Y'))+1
                ]);
            
            }
        } else {
                $mandat = Mandat::where('annee_debut',intval(Carbon::now()->format('Y'))-1)->first();
                if(!$mandat){
                $mandat = Mandat::create([
                        "annee_debut"=>intval(Carbon::now()->format('Y')),
                        "annee_fin"=>intval(Carbon::now()->format('Y'))+1
                    ]);
            }
        } 
        return $mandat;
    }
// }