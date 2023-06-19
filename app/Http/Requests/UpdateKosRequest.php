<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKosRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|max:50',
            'lokasi' => 'required|max:200',
            'category_id' => 'required',
            'harga' => 'required|numeric',
            'image' => 'image|file|max:10240',
        ];
    }
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama kos wajib diisi',
            'nama.max' => 'Nama terlalu panjang',
            'lokasi.required' => 'Alamat kos wajib diisi',
            'lokasi.max' => 'Alamat terlalu panjang',
            'image.max' => 'File tidak boleh lebih dari 10 MB',
        ];
    }





    protected function prepareForValidation()
    {
        $this->merge([
            'harga'=> str_replace('.', '', $this->harga)
        ]);
    }
}
