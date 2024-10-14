<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class ValidateFormRequest extends FormRequest
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
            "email"=>"required|string|email",
            "g-recaptcha-response"=>"required|string"
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $response = $this->input('g-recaptcha-response');
            $secretKey = env('VUE_APP_SECRET_KEY');

            // Verify the reCAPTCHA response with Google's API
            $verificationResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $response,
            ]);

            $verificationData = $verificationResponse->json();

            if (!$verificationData['success']) {
                $validator->errors()->add('g-recaptcha-response', 'reCAPTCHA verification failed.');
            }
        });
    }
}
