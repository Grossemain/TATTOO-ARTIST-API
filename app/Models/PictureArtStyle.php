<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PictureArtStyle extends Pivot
{
    protected $table = 'have';

    protected $fillable = ['picture_id', 'style_id'];
}