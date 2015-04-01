<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserProfileRequest extends Request {

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
		return [
			//
            'name' => 'required|between:5,16|alpha_dash|Unique:users,name',
            'password' => 'required|between:6,16|alpha_dash|confirmed',
            'email' => 'required|unique:users,email',
            'telephone' => 'required|digits:11',
            'sex' => 'required|size:1',
            'is_banned' => 'required|boolean',
		];
	}

}
