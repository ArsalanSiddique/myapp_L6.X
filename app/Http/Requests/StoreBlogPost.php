<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'name' => 'required|alpha_dash',             // abc_abc-abc
            // 'name' => 'required'|alpha,                //  asjdkasjdkajs
            // 'name' => 'required'|alpha_num,             // asjdkasjdkajs8273198292
            // 'name' => 'bail|required|alpha',
            'email' => 'bail|required|email:rfc,filter',
            // 'password' => 'bail|digits_between:08,25|confirmed|required',
            // 'content' => 'required',
            // 'skills' => 'required|array',
            'gender' => 'required',
            // 'profile' => 'required|between:2000,8000',
            // 'tos' => 'accepted',
            // 'website' => 'required|active_url',
            // 'start_date' => 'bail|required|date|after:today',
            // 'end_date' => 'bail|required|date|date_equals:start_date|after:tomorrow',
            // 'end_date' => 'bail|required|date|different:start_date|after:tomorrow',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //'required' => 'Field is required'
            'name.required' => 'Name is required for process',
            'tos.accepted' => 'Terms and Services must ne checked'
            
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'profile' => 'Logo'
        ];
    }


}
