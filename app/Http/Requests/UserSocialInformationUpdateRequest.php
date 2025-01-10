<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSocialInformationUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Facebook'=>'sometimes|url|nullable',
            'X'=>'sometimes|url|nullable',
            'Gmail'=>'sometimes|url|nullable',
            'GitHub'=>'sometimes|url|nullable',
        ];
    }
}
