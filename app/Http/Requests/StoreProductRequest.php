<?php

namespace App\Http\Requests;

use App\Http\Responses\ApiResponse;
use App\Utils\Constants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser string.',
            'max' => 'El campo :attribute no puede superar los 255 caracteres.',
            'min' => 'El campo :attribute no puede ser negativo',
            'numeric' => 'El campo :attribute debe ser un número.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errorMessages = collect($validator->errors()->all());

        throw new HttpResponseException(
            ApiResponse::error($errorMessages, Constants::FAILED)
        );
    }
}
