<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $table = 'portfolios';
    protected $fillable = [
        'title', 'sub_title', 'big_img', 'small_img', 'client', 'category', 'description'
    ];
}
