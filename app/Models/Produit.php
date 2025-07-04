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

    public function getPrixAttribute($value)
    {
        return number_format($value, 2, ',', ' ');
    }

    public function setPrixAttribute($value)
    {
        $this->attributes['prix'] = str_replace(',', '.', $value);
    }
}
