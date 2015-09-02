<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdminController;
use DB;
class Test extends Model {
	
	protected $table = 'test';
	
	public function test_test()
	{
		return DB::table("test")->get();
	}

}
