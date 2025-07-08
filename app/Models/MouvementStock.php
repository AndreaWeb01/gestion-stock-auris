<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MouvementStock extends Model
{
    protected $primaryKey = 'id_mouvement_stock';

    protected $fillable = [
        'produit_id',
        'user_id',
        'quantite',
        'motif',
        'type_mouvement',
        'date_mouvement',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




    





