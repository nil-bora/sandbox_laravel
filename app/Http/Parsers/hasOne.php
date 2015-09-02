<?php namespace App\Http\Parsers;
use App\Http\Controllers\Admin\ParserController;

class hasOne extends ParserController{
	//name conf => parser
	public static $conf = ["hasTable"=>["parser" => "select", "name"=>"Таблица"]];
	
	public static function show($model, $name, $value, $label, $params)
	{
		if($params)
		{
			$params_array = json_decode($params, true);
			if(isset($params_array['model']))
			{
				$nameHasModel = strtolower($params_array['model']);
				$hasModel = \DB::table($nameHasModel)->get();
				
				$t = \App\Http\Models\News::where($name, '=', $value)->first()->$nameHasModel;
				
				return view("admin.parsers.hasOne_show", ["name"=>$name, "value"=>$value, "label"=>$label, "selected"=>$t, "hasModel"=>$hasModel])->render();
				//dd($t);
			}
		}
		
		$t = \DB::table($model)->where($name, '=', $value)->first();
		
		
		//dd($t);
		
	}
	public static function getTypeField()
	{
		return 'string';
	}
	
	public static function getConfig($parser_conf=false)
	{
		$patch = app_path()."/Http/Models/";
			
		$models = scandir($patch);
		$data = [];
		if(isset($models))
		{
			foreach($models as $key=>$item)
			{
				if(!is_file($patch.$item))
					unset($models[$key]);
				else
				{
					$data[] = substr($item,0, -4);
				}
			}
			
			
		}
		
		return view("admin.parsers.hasOne", ["name"=>"hasModel", "value"=>$data, "label"=>"", "params"=>""])->render();
		
		//$conf = ["hasTable"=>["parser" => "select", "name"=>"Таблица", "value"=>$data]];
		//return $conf;
		//return self::$conf;
	}
}