<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileRequest extends Request {

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
            'name' => 'required|between:5,16|alpha_dash|Unique:users,name,'.$this->id,
            'email' => 'required|unique:users,email,'.$this->id,
            'telephone' => 'required|digits:11|unique:users,telephone,'.$this->id,
            'sex' => 'required|size:1',
            'is_banned' => 'required|boolean',
		];
	}

}
