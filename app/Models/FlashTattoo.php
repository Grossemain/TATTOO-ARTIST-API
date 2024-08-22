<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashTattoo extends Model
{
    use HasFactory;

    protected $primaryKey = 'flashtattoo_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'flashtattoo_id', 
        'title', 
        'h1_title', 
        'content', 
        'img_flashtattoo', 
        'disponibility', 
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
