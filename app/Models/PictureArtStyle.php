<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PictureArtStyle extends Pivot
{
    protected $table = 'pictures_art_styles';

    protected $fillable = ['picture_id', 'style_id'];
}