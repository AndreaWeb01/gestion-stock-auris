<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementStock extends Model
{
    protected $fillable = [
            'produit_id',
            'id_client',
            'id_user',
            'quantite',
            'type',
            'date',
            'motif',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function getTypeAttribute($value)
    {
        return ucfirst($value);// Capitalize the type for better readability
    }
}
