<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likeFilm extends Model
{
    protected $table ='likeFilm';

    protected $fillable = ['email','film_name'];
}
