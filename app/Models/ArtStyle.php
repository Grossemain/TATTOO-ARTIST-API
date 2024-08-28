<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtStyle extends Model
{
    use HasFactory;

    protected $primaryKey = 'style_id';

    protected $fillable = [
        'artstyle_id', 
        'name', 
        'description', 
        'img_style'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_art_styles', 'artstyle_id', 'user_id');
    }

}
