<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Article;
use App\Models\User;

class TattooShop extends Model
{
    use HasFactory;

    protected $primaryKey = 'tattooshop_id';
    // public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'tattooshop_id', 
        'name', 
        'adresse', 
        'city', 
        'departement', 
        'title', 
        'meta_description', 
        'img_tattooshop',
        'user_id'
    ];
    
    public function articles()
    {
        return $this->hasMany(Article::class, 'tattooshop_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
