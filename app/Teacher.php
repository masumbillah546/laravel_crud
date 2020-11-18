<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   protected $fillable=['name','fileToUpload','gender','desi','district'];
}
