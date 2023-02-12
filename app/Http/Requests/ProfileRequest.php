<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $imageValidation = 'required|image|mimes:jpg,png,jpeg,gif';
        return [
            'first_name' => 'required', 'string', 'max:255',
            'lust_name' => 'required', 'string', 'max:255',
            'address' => 'required', 'string', 'max:255',
            'image' => $imageValidation

        ];
    }
}
