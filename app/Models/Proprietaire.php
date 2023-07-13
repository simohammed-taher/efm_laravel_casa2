<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom', 'cin',
        'email', 'fonction'
    ];
    public function batiments()
    {
        return $this->hasMany(Batiment::class, 'id_proprietaire');
    }
}
