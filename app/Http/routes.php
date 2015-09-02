<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('admin', 'Admin\AdminController@index');

Route::get('admin/create/table', 'Admin\AdminController@createTable');

Route::get('admin/table/show/{id}/', 'Admin\AdminController@showTable');

Route::get('admin/table/add/{id}/', 'Admin\AdminController@addFieldTable');

Route::get('admin/table/edit/{idTable}/{idField}', 'Admin\AdminController@editFieldTable');

Route::get('admin/parsers/{id}/', 'Admin\AdminController@showTableParsers');

Route::get('admin/parsers/add/{id}/', 'Admin\AdminController@addParsers');

Route::get('admin/parsers/edit/{id}/', 'Admin\AdminController@editParsers');


Route::post('admin/createfield', 'Admin\AjaxController@createField');

Route::post('admin/checkParserConf', 'Admin\AjaxController@checkParserConf');

Route::post('admin/create_table', 'Admin\AjaxController@createNewTable');

Route::post('admin/save_parser', 'Admin\AjaxController@saveParser');


/*
View::composers([
  'AdminComposer' => ['welcome']
]);
*/
//View::composer('welcome', 'AdminComposer');

\View::composers([
    'App\Http\Composers\admin\AdminComposer' => ['admin.layout'],
]);

Route::get('/foo', function()
{
    $this->app['Illuminate\Contracts\Console\Kernel']->call('make:controller', ['name' => 'foo']);
 
    //
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
