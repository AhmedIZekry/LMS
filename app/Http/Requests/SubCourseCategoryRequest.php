<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCourseCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|unique:course_categories,name,',
            'icon' => 'required|nullable|string',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'show_at_trending' =>'sometimes|nullable|boolean',
            'status' => 'sometimes|nullable|boolean',
            'slug' => 'nullable|string|unique:course_categories,slug,',
            'parent_id' => 'sometimes|nullable|integer',
        ];
    }
}
