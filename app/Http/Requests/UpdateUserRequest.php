<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'username' => ['required', 'string', 'max:250', Rule::unique('users')->ignore($this->id)],
            'password' => 'nullable|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 100 karakter',
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username maksimal 250 karakter',
            'username.unique' => 'Username sudah terdaftar',
            'password.min' => 'Password minimal 6 karakter',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
}
