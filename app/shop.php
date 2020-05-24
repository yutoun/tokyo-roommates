<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function category(){
      return $this->belongsto('App\Category');
    }
    public function user()
   {
       return $this->belongsTo('App\User');
   }
}
