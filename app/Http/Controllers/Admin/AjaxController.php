<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Console\Application;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Artisan;
use Input;
use Response;
use DB;
use Schema;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Controllers\Admin\ParserController;

class AjaxController extends Controller {

	private $column;
	private $type;
	private $multi_lang;
	private $langs = ['ru','uk','en'];
		
	public function saveParser()
	{
		if(\Request::ajax())
		{
			$data = Input::all();
			if(is_array($data))
			{
				foreach($data as $key=>$item)
				{
					$data[$key] = trim($item);
				}
			}
			$id = $data['id'];
			unset($data['id']);
			unset($data['_token']);
			
			$rows = DB::table('cms_parsers')->where('id', '=', $id)->update($data);
			if($rows)
				return Response::json(['update' => 1]);
		}
	}
	
	public function checkParserConf()
	{
		if(\Request::ajax())
		{
			$data = Input::all();
			if(isset($data['name']) && !empty($data['name']))
			{
				$dd = ParserController::getConf($data['name']);
				return Response::json(array('field' => $dd ));
				/*
				$conf = json_decode(base64_decode($data['name']), true);
				
				foreach($conf as $key=>$item)
				{
					 if(is_array($item))
					 {
						 $field[] = ParserController::showField($item['parser'], "parser_conf[".$key."]", "", $item['name']);		 
					 }
					
				}
				if($field)
				
		
				 */
				
			}
		}
	}
	
	public function createField()
	{
		if(\Request::ajax())
		{
			$data = Input::all();
			if(isset($data))
			{
				foreach($data as $key=>$item)
				{
					if(!is_array($item))
						$data[$key] = strip_tags(trim($item));
				}
					
				
				if(isset($data['parser']))
				{
					$type = ParserController::getTypeParser($data['parser']);
					if($data['hasModel'])
					{
							$create = ParserController::createParser($data['parser'], $data['column'], $data['table'], $data['hasModel']);
					}

					$this->column = $data['column'];
					$this->type = $type;
					if(!Schema::hasColumn($data['table'], $data['column']))
					{
						if(isset($data['multi_lang']) && $data['multi_lang']==1)	
							$this->multi_lang = 1;
						
						Schema::table($data['table'], function ($table) {
							$type = $this->type;
							
							if($this->multi_lang == 1)
								foreach($this->langs as $one)
									$table->$type($this->column."_".$one);
							else
								$table->$type($this->column);
						 
						});
						
						unset($data['_token']);
						
						unset($data['foregenkey']);
						if(isset($data['hasModel']))
						{
							$conf_model = ['model'=>$data['hasModel']];
							$data['parser_conf'] = json_encode($conf_model);
							unset($data['hasModel']);
						}
						if(isset($data['parser_conf']))
							$data['parser_conf'] = json_encode($data['parser_conf']);
						
						$id = DB::table('cms_parsers')->insertGetId($data);
						
						if($id)
							return Response::json(array('ok' => 1 ));
					}else{
						return Response::json(array('error' => 'two_column' ));
					}
						
					
				}
			}
		}
	}
	
	public function createNewTable(AdminRequest $request)
	{

		if(\Request::ajax())
		{
			
			$data['name'] = trim(Input::get('name'));
			$data['system_name'] = trim(Input::get('system_name'));
			$data['active'] = Input::get('active') ? 1 : -1;

			if(!Schema::hasTable($data['system_name']))
			{
				Artisan::call('make:model', ['name' => 'Http/Models/'.ucfirst($data['system_name'])]);
				Schema::create($data['system_name'], function ($table) {
				  $table->increments('id');
				});
				DB::table('cms_tables')->insert(array($data));
			}else{
				return Response::json(array('error' => 'two_table' ));
			}							
		}
		//return view('admin.table');
	}

}
