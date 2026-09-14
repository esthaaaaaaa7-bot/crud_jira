<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return session()->has('user');
    }

    public function rules(): array
    {
        return [
            'nama_project' => 'required|string|max:255',
            'deskripsi'    => 'nullable|string',
            'deadline'     => 'nullable|date',
            'key'          => 'nullable|string|max:10|unique:projects,key',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_project.required' => 'Nama proyek wajib diisi',
            'key.unique'            => 'Kode pengenal proyek (key) sudah digunakan',
        ];
    }
}
