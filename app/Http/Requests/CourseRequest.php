<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'seo_description'=>'nullable|string|max:255',
            'demo_video_storage'=>'nullable|string|in:,youtube,vimeo,external_link,upload',
            'price'=>'required|numeric|min:0',
            'discount'=>'nullable|numeric|min:0',
            'description'=>'nullable|string',
            'thumbnail'=>'nullable|image|mimes:jpeg,jpg,png|max:2000',
            'demo_video_source'=>'nullable|string',
        ];
    }
}
