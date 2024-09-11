<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $primaryKey = 'article_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'article_id', 
        'title', 
        'content', 
        'img', 
        'tattooshop_id'
    ];

    public function tattooshop()
    {
        return $this->belongsTo(Tattooshop::class, 'tattooshop_id');
    }
}
