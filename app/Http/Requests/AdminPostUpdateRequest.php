<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminPostUpdateRequest extends FormRequest
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
        //$id = $this->route('')->id;
        return [
            'heading' => 'required',
            'slug' => ['required','alpha_dash',Rule::unique('posts')->ignore($this->id, 'id')],
            'short_description' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png,gif'
        ];
    }
}
