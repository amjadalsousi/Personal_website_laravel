<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    protected $fillable = [
        'title1', 'title12', 'image', 'description'
    ];
}
