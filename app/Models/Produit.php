<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'prix',
        'seuil_alerte',

    ];
    public function mouvements()
{
    return $this->hasMany(MouvementStock::class);
}

// Optionnel : méthode personnalisée
public function getStockAttribute()
{
    $entree = $this->mouvements()->where('type_mouvement', 'entrée')->sum('quantite');
    $sortie = $this->mouvements()->where('type_mouvement', 'sortie')->sum('quantite');
    return $entree - $sortie;
}


   
    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}
