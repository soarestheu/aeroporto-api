<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class StoreAeroportoRequest extends FormRequest
{
    use FailedValidationTrait;

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
            "nome" => "required|max:191",
            "codigo_iata" => "required|max:191",
            "cd_cidade" => "required|integer"
        ];
    }

    public function messages(): array
    {
        return [
            "cd_cidade" => [
                "required"  => "Campo :attribute obrigatório.",
                "integer"  => "Campo :attribute é permitido apenas inteiro.",
            ],
            "nome" => [
                "required"  => "Campo nome obrigatório.",
                "max"  => "Campo nome só é permitido até 191 digitos.",
            ],
            "codigo_iata" => [
                "required"  => "Campo :attribute obrigatório.",
                "max"  => "Campo :attribute só é permitido até 191 digitos.",
            ],
        ];
    }


    public function attributes() : array 
    {
        return [
            "codigo_iata"   =>  "Código IATA",
            "cd_cidade"     =>  "Cidade"
        ]; 
    }
}
