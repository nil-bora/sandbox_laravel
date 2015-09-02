<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use App\Http\Parsers\input as p_input;

class ParserController extends Controller {

	public static function createParser($parser, $field=false, $model=false, $hasModel=false)
	{
		$name = [];
		if($model)
		{
			$patch = app_path()."/Http/Models/";
			$patch_model = 'App\Http\Models\\';
			
			$models = scandir($patch);
			if(isset($models))
			{
				foreach($models as $key=>$item)
				{
					if(is_file($patch.$item) && strcasecmp($model, substr($item,0, -4))==0)
					{
						
						if(class_exists($patch_model.$hasModel))
						{
							if(method_exists($patch_model.ucfirst($model), $hasModel))
								dd(11);
							else
							{
								$fl = file_get_contents($patch.$item);
						
								$pos = strpos($fl, '{');
								if($pos!==false)
								{
									$spath=substr($fl,0,$pos+1)."\n\n\tpublic function ".$hasModel."()\n\t{\n\t\treturn \$this->belongsTo('App\Http\Models\\".$hasModel."', '".$field."');\n\t}\n".substr($fl,$pos+1);
								}
								
								file_put_contents($patch.ucfirst($model).".php", $spath);
							}
						}						

					}
				}
				return true;
			}
		}
		
	}
	
	public static function getTypeParser($parser)
	{
		$parser = 'App\Http\Parsers\\'.$parser;
		$type = $parser::getTypeField();
		return $type;
	}
	
	public static function showField($model, $parser, $name, $value, $label, $params=[])
	{
		$parser = 'App\Http\Parsers\\'.$parser;
		$type = $parser::show($model, $name, $value, $label, $params);
		return $type;
	}
	
	public static function getConf($parser, $parser_conf=false)
	{
		$parser = 'App\Http\Parsers\\'.$parser;
		if(method_exists($parser, 'getConfig'))
			return $parser::getConfig($parser_conf);
		else return 0;
	}
	
	public static function getParsers()
	{
		$patch = app_path()."/Http/Parsers/";
			
		$parsers = scandir($patch);
		$data = [];
		if(isset($parsers))
		{
			foreach($parsers as $key=>$item)
			{
				if(!is_file($patch.$item))
					unset($parsers[$key]);
				else
				{	
					$name = substr($item,0, -4);
					$conf = json_encode(self::getConf($name));

					if($conf)
						$conf = $conf;
					$data[] = ['name'=>$name, 'conf'=>$conf];		
				}
			}

			return $data;
		}	
	}
	
	public function createField($field, $table)
	{
		
	}

}
