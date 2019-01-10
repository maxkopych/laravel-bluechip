<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
	public function user(){
		//connecting with user
		return $this->belongsTo("App\User");
	}
}
