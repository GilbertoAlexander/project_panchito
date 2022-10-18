<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBloggerRequest extends FormRequest
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
        $admin_blogger = $this->route()->parameter('admin_blogger');
        $rules = [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:3000',
            'password' => 'required',
            'confirmpassword' => 'required'
        ];
        if ($admin_blogger) {
            $rules['name'] = 'required|unique:users,name,' . $admin_blogger->id;
            $rules['email'] = 'required|unique:users,email,' . $admin_blogger->id;
            $rules['imagen'] = 'image|mimes:jpeg,png,jpg|max:3000,imagen,' . $admin_blogger->id;
            $rules['password'] = 'max:16,password,' . $admin_blogger->id;
            $rules['confirmpassword'] = 'max:16,confirmpassword,' . $admin_blogger->id;
        }

        return $rules;
    }
}
