<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 
        'is_admin', 
        'email_account', 
        'password', 
        'pseudo_user', 
        'email', 
        'tel', 
        'description', 
        'slug', 
        'style', 
        'instagram', 
        'img_profil', 
        'status_profil', 
        'city', 
        'departement', 
        'coordonnes', 
        'tattooshop', 
        'title', 
        'meta_description', 
        'tattooshop_id'
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

    public function tattooshop()
    {
        return $this->belongsTo(Tattooshop::class, 'tattooshop_id');
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class, 'user_id');
    }

    public function flashtattoos()
    {
        return $this->hasMany(Flashtattoo::class, 'user_id');
    }

    public function artstyles()
    {
        return $this->belongsToMany(Artstyle::class, 'concern', 'user_id', 'style_id');
    }
}
