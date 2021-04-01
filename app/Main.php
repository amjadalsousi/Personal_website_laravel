<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    protected $table = 'mains';
    protected $fillable = [
        'title', 'sub_title', 'bc_image', 'resume'
    ];
}
