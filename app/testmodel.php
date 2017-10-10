<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testmodel extends Model
{
   protected $table ='test';
   public $timestamps = false;
   protected $primaryKey ='id';
}