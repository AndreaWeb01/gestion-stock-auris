<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable; use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */  protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'telephone',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Get the roles associated with the user.
     */

    /**
     * Check if the user has a specific role.
     */
  

    /**
     * Get the full name of the user.
     */



   public function ventes()
    {
        return $this->hasMany(Vente::class, 'user_id');
    }

    /**
     * Get the movements associated with the user.
     */
    public function mouvements()
    {
        return $this->hasMany(MouvementStock::class, 'user_id');
    }

}
