<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaxCategor extends Model
{
   protected $table = 'daxcategor';
   protected $guarded = [];
   public function daxod() {
    return $this->hasMany('App\Daxod');
  }

}
