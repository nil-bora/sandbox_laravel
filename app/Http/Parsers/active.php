<?php namespace App\Http\Parsers;
use App\Http\Controllers\Admin\ParserController;

class active extends ParserController{
	
	protected $type = "checkbox";
	
	public static function show($model, $name, $value, $label, $params)
	{
		return view("admin.parsers.active", ["name"=>$name, "value"=>$value, "label"=>$label])->render();
	
	}
	
	public static function getTypeField()
	{
		return 'boolean';
	}
}