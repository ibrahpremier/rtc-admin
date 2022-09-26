<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandat extends Model
{
    use HasFactory;
    protected $fillable = [
        "annee_debut",
        "annee_fin"
    ];
}
