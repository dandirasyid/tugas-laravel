<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'gambar' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'nama' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kondisi' => 'required|not_in:0',
            'deskripsi' => 'required|max:2000'
        ];
    }

    public function messages(): array {
        return [
            'gambar.required' => 'Kolom gambar wajib diisi.',
            'gambar.image' => 'The image must be an image.',
            'gambar.max' => 'The image must be not be greater than 2048 kilobytes.',
            'nama.required' => 'Kolom nama wajib diisi.',
            'berat.required' => 'Kolom berat wajib diisi.',
            'harga.required' => 'Kolom harga wajib diisi.',
            'stok.required' => 'Kolom stok wajib diisi.',
            'kondisi.required' => 'Kolom kondisi wajib diisi.',
            'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
        ];
    }
}
