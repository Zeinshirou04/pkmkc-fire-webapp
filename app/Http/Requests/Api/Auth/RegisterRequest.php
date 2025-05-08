<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'first_name' => ['string', 'required'],
            'last_name' => ['string', 'required'],
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['string', 'required', Password::min(8)->mixedCase()->numbers()],
            'birth_date' => ['date', 'date_format:Y-m-d', 'required'],
            'phone' => ['string', 'max:20', 'required', 'starts_with:0']
        ];
    }

    public function wantsJson()
    {
        return true;
    }

    public function expectsJson()
    {
        return true;
    }
}
