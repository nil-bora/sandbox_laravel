<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	public function Test()
	{
		return $this->belongsTo('App\Http\Models\Test', 'hasMyTest');
	}


	//
}
