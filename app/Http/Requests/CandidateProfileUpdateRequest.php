<?php

namespace App\Http\Requests;

use App\Models\Candidate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CandidateProfileUpdateRequest extends FormRequest
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
        $obj = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
        $id = $obj->id;

        return [
            'name' => 'required',
            'username' => ['required','alpha_dash',Rule::unique('candidates')->ignore($id)],
            'email' => ['required','email',Rule::unique('candidates')->ignore($id)],
            'photo' => 'image|mimes:jpg,jpeg,png,gif|max:9000'
        ];
    }
}
