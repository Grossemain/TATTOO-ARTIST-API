<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $primaryKey = 'picture_id';

    protected $fillable = [
        'picture_id', 'image', 'alt', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artstyles()
    {
        return $this->belongsToMany(Artstyle::class, 'have', 'picture_id', 'style_id');
    }
}
