<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserArtStyle extends Pivot
{
    protected $table = 'concern';

    protected $fillable = ['user_id', 'style_id'];
}
