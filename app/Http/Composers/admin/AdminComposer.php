<?php namespace App\Http\Composers\admin;

use Illuminate\Contracts\View\View;
use App\Http\Models\Admin\Cms_tables;

class AdminComposer {

    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
    	
        $view->with('heder',view('admin.header'));
        
        $tables = new Cms_tables();
		$activeTable = $tables->getActiveTables();
        $view->with('left_column',view('admin.left_colum', ['tables'=>$activeTable]));
    }

}