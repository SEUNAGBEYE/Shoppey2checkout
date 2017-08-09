<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    //

    public function user(){
		$this->belongsTo('App\User');
	}
}
