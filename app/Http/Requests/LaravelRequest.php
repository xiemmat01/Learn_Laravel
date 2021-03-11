<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaravelRequest extends FormRequest
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
        return [
            'name'=>'required|unique:users,name',
                'email'=>'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
                'password'=>'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => "Vui lòng nhập tên",
                'name.unique' => "Tên này đã tồn tại",
                'email.required' => "Vui lòng nhập email",
                'email.regex' => "Email không hợp lệ",
                'password.required' => "Vui lòng nhập password",
        ];
    }
}
