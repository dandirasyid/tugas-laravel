<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            return [
                'nama' => 'required',
                'email' => 'required',
                'gender' => 'required',
                'harga' => 'required',
                'stok' => 'required',
                'kondisi' => 'required|not_in:0',
                'deskripsi' => 'required|max:2000'
            ];
        ];
    }
}
