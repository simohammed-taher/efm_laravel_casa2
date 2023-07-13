<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    use HasFactory;
    protected $fillable = [
        'adresse', 'nom', 'id_proprietaire', 'entree_principale', 'entree_secondaire', 'nbApptDispo',
    ];
    public function proprietaire()
    {
    return $this->belongsTo(proprietaire::class, 'id_proprietaire');
    }
}
