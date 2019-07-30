<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
 protected $table ='films';

 protected $fillable =['title','subtitle','content'];
}
