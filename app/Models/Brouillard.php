<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Brouillard extends Model
{
    use HasFactory;

    protected $fillable = [
        "solde_initial",
        "designation",
        "montant",
        "type",
        "solde",
        "mandat_id",
        "admin_id"
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::create($date)->format('d/m/Y H:i');
    }
}
