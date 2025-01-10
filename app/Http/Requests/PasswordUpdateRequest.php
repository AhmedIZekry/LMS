<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'required|string|min:8',
            'new_password' => ['required','confirmed','string',Password::defaults(),'min:8'],
        ];
    }
    public function messages(): array{
        return [
            'current_password.required' => 'Current password is required',
            'current_password.string' => 'Current password must be string',
            'current_password.min' => 'Current password must be 8 characters',
            'new_password.required' => 'New password is required',
            'new_password.string' => 'New password must be string',
            'new_password.min' => 'New password must be 8 characters',
            'new_password.confirmed' => 'New password and confirmation must be same',
        ];
    }

    public function withValidator($validator){
        $validator->after(function ($validator) {
           if(!Hash::check($this->current_password,auth()->user()->password)){
               $validator->errors()->add('current_password', 'Current_password is incorrect');
           }
        });
    }
}
