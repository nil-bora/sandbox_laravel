<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Models\Admin\Cms_tables;
use Artisan;
use Input;
use Response;
use DB;
use Schema;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Controllers\Admin\ParserController;


class AdminController extends Controller {

	private $column;
	private $type;
	private $multi_lang;
	private $langs = ['ru','uk','en'];
	
	public function index()
	{
		$tables = new Cms_tables();
		$activeTable = $tables->getActiveTables();
		
		return view('admin.index', ['tables'=>$activeTable]);
	}
	
	public function createTable()
	{
		return view('admin.table');
	}
	
		
	
	public function showTable($id)
	{
		if((int)$id)
		{
			$id = (int)$id;
			$table = Cms_tables::find($id);
			
			if(isset($table->system_name))
			{
				
				$columns = DB::table("cms_parsers")->where('table', $table['system_name'])->where('show','1')->get();
				
				$select = ['id'];
				//dd($columns);
				foreach($columns as $one)
				{
					if($one->multi_lang == 1)
						$select[] = $one->column."_ru"; // TODO Locale
					else
						$select[] = $one->column;
				}
				
				$paginator = "";
				
				if($table->onpage > 0)
				{
					$table_row = DB::table($table->system_name)->select($select)->paginate($table->onpage);
					if($table_row->total() > $table->onpage)
					{
						$countPage = ceil($table_row->total() / $table->onpage);
						if(method_exists($table_row, 'total'))
							$paginator = view("admin.paginator.paginator", ["array"=>$table_row, "countPage"=>$countPage])->render();
					}
				}		
				else
				{
					$table_row = DB::table($table->system_name)->select($select)->get();
				}
				
				if(isset($table_row))
				{	
				
					return view('admin.show_table', ['id'=>$id, 'columns'=>$columns, 'select'=>$select, 'array'=>$table_row, 'paginator'=>$paginator]);
				}
			}
		}		
	}
	
	public function addFieldTable($id)
	{
		if((int)$id)
		{
			$id = (int)$id;
			$fields = $this->crud($id);
			return view('admin.add_field_table', ['fields'=>$fields]);
			
		}		
	}
	
		
	public function editFieldTable($idTable, $idField)
	{
		if((int)$idTable && (int)$idField)
		{
			$idTable = (int)$idTable;
			$idField = (int)$idField;
			$fields = $this->crud($idTable, $idField);
			return view('admin.add_field_table', ['fields'=>$fields]);
		}
	}
	
	public function crud($idTable, $idField=false)
	{
		$table = Cms_tables::find($idTable);
		if(isset($table->system_name))
		{
			$columns = DB::table("cms_parsers")->where('table', $table->system_name)->get();

			$select = [];
			
			foreach($columns as $one)
			{
				if($one->multi_lang == 1)
				{
					// добавить запрос в таблицу локализаций
					foreach($this->langs as $item)
						$select[$one->column."_".$item] = $one; // TODO Locale
				}
				else
				{
					$select[$one->column] = $one;
				}
			}
			
			if($idField)
			{
				$activeField = DB::table($table->system_name)->find($idField);
			}

			$fields = [];
						
			foreach($select as $key=>$item)
			{	
				$params = [];
				
				if($item->parser_conf)
					$params = json_decode($item->parser_conf, true);
				
				if(isset($activeField))
					$fields[] = ParserController::showField($table->system_name, $item->parser, $key, $activeField->$key, $item->column_name, $params);
				else
					$fields[] = ParserController::showField($table->system_name, $item->parser, $key, "", $item->column_name, $params); 
			}
			
			return $fields;
		}
	}

	
	public function showTableParsers($id)
	{
		if((int)$id)
		{
			$id = (int)$id;
			$table = Cms_tables::find($id);
			$parsers = DB::table('cms_parsers')->where('table','=',$table->system_name)->get();

			return view('admin.show_table_parsers', ['id'=>$id, 'parsers'=>$parsers]);
		}
		
	}
	
	public function addParsers($id)
	{
		if((int)$id)
		{
			$id = (int)$id;
			
			$pp = ParserController::getParsers();
			$table = Cms_tables::find($id);
		
			return view('admin.add_parsers', ['parsers'=>$pp, 'table'=>$table]);
		}
	}
	
	public function editParsers($id)
	{
		if((int)$id)
		{
			$parser = DB::table("cms_parsers")->find($id);
			$configParser = json_decode($parser->parser_conf, true);
			$config = ParserController::getConf($parser->parser, $configParser);
			
			

			//dd($config);
			$confField = [];
			/*
			if($config)
			{
				
				foreach($config as $key=>$item)
				{
					if($configParser)
					{
						foreach($configParser as $k=>$v)
						{
							if($k == $key)
							{
								$confField[] = ParserController::showField($item['parser'], "parser_conf[".$k."]", $v, $item['name']);
							}
						}
					}
					
				}
			}
			*/
			$pp = ParserController::getParsers();

			return view('admin.edit_parsers', ['confField' => $config, 'parsers'=>$pp, 'parser'=>$parser, 'id'=>$id]);
		}
	}	

	
	public function add_table()
	{
		$name = 'Foo';
		//Artisan::call('make:controller', ['name' => $name, '--plain'=>true]);
		Artisan::call('make:model', ['name' => $name]);
		Schema::create($name, function ($table) {
		  $table->increments('id');
		});
	}

}
