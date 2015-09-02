<?php namespace App\Http\Parsers;
use App\Http\Controllers\Admin\ParserController;
class textarea extends ParserController{
	//name conf => parser
	public static $conf = ["visual_redactor"=>["parser" => "active", "name"=>"Визуальный редактор"]];
	
	public static function show($model, $name, $value, $label, $params)
	{	
		return view("admin.parsers.textarea", ["name"=>$name, "value"=>$value, "label"=>$label, "params"=>$params])->render();
	}
	public static function getTypeField()
	{
		return 'text';
	}
	
	public static function getConfig($parser_conf=false)
	{
		//dd(self::$conf['visual_redactor']['name']);
		//return self::$conf;
		if($parser_conf['visual_redactor'])
			$value = $parser_conf['visual_redactor'];
		else 
			$value = 0;
		return view("admin.parsers.active", ["name"=>"visual_redactor", "value"=>$value, "label"=>self::$conf['visual_redactor']['name'], "params"=>""])->render();
	}
}