<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
    return[
            'name'=>'required',
            'email' =>'required|unique:users|email',
            'phone'=>'required',
            'address'=>'required',
            'day_of_birth'=>'required',
            'position'=>'required',
    ];
    }
}
