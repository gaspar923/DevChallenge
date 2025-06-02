<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserPut extends FormRequest
{
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'email' => 'email',
            'password' => 'contraseña',

            'role' => 'rol',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->route('user')->id,
            // 'password' => 'required|string|min:8',
            // 'password' => ['required', 'string', 'min:8', Password::defaults()],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', Password::defaults()],

            'role' => 'required',
        ];
    }
}
