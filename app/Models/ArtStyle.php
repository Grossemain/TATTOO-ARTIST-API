<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class ArtStyle extends Model
{
    use HasFactory;

    protected $primaryKey = 'artstyle_id';

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
