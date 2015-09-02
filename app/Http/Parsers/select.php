<?php namespace App\Http\Parsers;
use App\Http\Controllers\Admin\ParserController;
class select extends ParserController{
	//name conf => parser
	//public static $conf = ["visual_redactor"=>["parser" => "active", "name"=>"Визуальный редактор"]];
	
	public static function show($model, $name, $value, $label, $params)
	{	
		return view("admin.parsers.select", ["name"=>$name, "value"=>$value, "label"=>$label, "params"=>$params])->render();
	}
	public static function getTypeField()
	{
		return 'text';
	}
	
	public static function getConfig()
	{
		//return self::$conf;
	}
}