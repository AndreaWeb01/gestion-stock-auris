<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementStock extends Model
{
    protected $fillable = [
            'produit_id',
            'user_id',
            'quantite',
            'type_mouvement',
            'date_mouvement',
            'motif',
            'vente_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function produit()
{
    return $this->belongsTo(Produit::class);
}


    public function getTypeAttribute($value)
    {
        return ucfirst($value);// Capitalize the type for better readability
    }
}
