<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\FailedValidationTrait;
use App\Rules\CheckClasse;
use App\Rules\VooCheckVooRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;

class StoreVooRequest extends FormRequest
{
    use FailedValidationTrait;
    public $statusError = Response::HTTP_NOT_ACCEPTABLE;

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
            "numero"                => "required|max:191|unique:voos",
            "cd_aeroporto_origem"   => "required|integer",
            "cd_aeroporto_destino"  => [
                "required",
                "integer", 
                new VooCheckVooRule(
                    Request()->input('cd_aeroporto_origem'), 
                    Request()->input('cd_aeroporto_destino')
                )
            ],
            "data_partida"          => "required|date_format:Y-m-d",
            "hora_partida"          => "required|date_format:H:i",
            "classe"                => [
                "required",
                "array",
                new CheckClasse
            ],
        ];
    }

    public function messages(): array {
        return [
            'numero'    => [
                "required"  => "Campo :attribute é obrigatório.",
                "unique"    => "Campo :attribute informado já existe, informe outro",
                "max"       => "Campo :attribute só é permitido até 191 digitos.",
            ],
            "cd_aeroporto_origem"   => [
                "required"  => "Campo :attribute é obrigatório.",
                "integer"   => "Campo :attribute deve ser do tipo inteiro",
            ],
            "cd_aeroporto_destino.required"  => "Campo :attribute é obrigatório.",
            "cd_aeroporto_destino.integer"  => "Campo :attribute deve ser do tipo inteiro",
            "data_partida"          => [
                "required"      => "Campo :attribute é obrigatório.",
                "date_format"   => "Campo :attribute deve ser enviado no formato 'Y-m-d'.",
            ],
            "hora_partida"          => [
                "required"      => "Campo :attribute é obrigatório.",
                "date_format"   => "Campo :attribute deve ser enviado no formato 'Hora:minuto'.",
            ],
            "classe"                => [
                "required"  => "Campo :attribute é obrigatório.",
                "array"     => "Campo :attribute deve ser do tipo array.",
            ]
        ];
    }

    public function attributes(): array {
        return [
            "numero"                => "Número",
            "cd_aeroporto_origem"   => "Aeroporto de origem",
            "cd_aeroporto_destino"  => "Aeroporto de destino",
            "data_partida"          => "Data de partida",
            "hora_partida"          => "Hora de partida",
            "classe"                => "Classes",
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     // dd($validator);
    //     $errors = $validator->errors()->messages();

    //     $this->statusError = Response::HTTP_UNPROCESSABLE_ENTITY;

    //     if ($this->statusError === Response::HTTP_NOT_ACCEPTABLE) {
    //         $errorsData = [];
    //         foreach ($errors as $key => $erro) {
    //             $errorsData[$key] = $erro[0];
    //         }
    //     } else {
    //         $errorsData = [
    //             'title' => 'ERRO',
    //             'message' => $errors[array_keys($errors)[0]][0],
    //             'type' => 'error',
    //             'timeout' => 4000
    //         ];
    //     }
    //     throw new HttpResponseException(response()->json($errorsData,  $this->statusError));
    // }
}
