<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class MyRequest extends Request {
	
	protected $rules = [    
        'name' => 'required',
        'system_name' => 'required',
    ];
	public function __construct()
	{

	}
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return $this->rules;
	}

}
