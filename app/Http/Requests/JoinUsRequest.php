<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JoinUsRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'message_user' => ['required', 'string', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            // Nome
            'name.required' => 'Il campo nome è obbligatorio.',
            'name.string' => 'Il campo nome deve essere una stringa.',
            'name.max' => 'Il campo nome non può superare i 255 caratteri.',

            // Cognome
            'last_name.required' => 'Il campo cognome è obbligatorio.',
            'last_name.string' => 'Il campo cognome deve essere una stringa.',
            'last_name.max' => 'Il campo cognome non può superare i 255 caratteri.',

            // Email
            'email.required' => 'Il campo email è obbligatorio.',
            'email.string' => 'Il campo email deve essere una stringa.',
            'email.email' => 'Il campo email deve essere un indirizzo email valido.',
            'email.max' => 'Il campo email non può superare i 255 caratteri.',

            // Messaggio
            'message_user.required' => 'Il campo messaggio è obbligatorio.',
            'message_user.string' => 'Il campo messaggio deve essere una stringa.',
            'message_user.max' => 'Il campo messaggio non può superare i 500 caratteri.',
        ];
    }
}
