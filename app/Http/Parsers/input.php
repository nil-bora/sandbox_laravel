<?php namespace App\Http\Parsers;
use App\Http\Controllers\Admin\ParserController;

class input extends ParserController{
	
	protected $type = "text";
	
	public static function show($model, $name, $value, $label, $params)
	{
		
		return view("admin.parsers.input", ["name"=>$name, "value"=>$value, "label"=>$label])->render();
	
	}
	
	public static function getTypeField()
	{
		return 'string';
	}
}