<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserPersonalInformationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = Auth::user();
        return [
            'name'=>'sometimes|nullable|string|max:255',
            'email' => 'sometimes|nullable|email|max:255|unique:users,email,' . $user->id,
            'headline' => 'sometimes|nullable|string|max:255',
            'gender'=>'sometimes|nullable|string|in:male,female',
            'bio'=>'sometimes|nullable|string',
            'image'=>'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
