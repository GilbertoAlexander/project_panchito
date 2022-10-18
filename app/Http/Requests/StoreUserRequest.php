<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
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
        $user = $this->route()->parameter('user');
        $rules = [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'password' => 'required',
            'confirmpassword' => 'required'
        ];
        if ($user) {
            $rules['name'] = 'required|unique:users,name,' . $user->id;
            $rules['email'] = 'required|unique:users,email,' . $user->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $user->id;
            $rules['password'] = 'max:16,password,' . $user->id;
            $rules['confirmpassword'] = 'max:16,confirmpassword,' . $user->id;
        }

        return $rules;
    }
}
