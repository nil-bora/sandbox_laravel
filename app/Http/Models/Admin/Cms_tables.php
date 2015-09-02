<?php namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdminController;

class Cms_tables extends Model {

	public function getActiveTables()
	{
		return Cms_tables::where('active','=','1')->get();
	}

}
