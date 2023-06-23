<?php

namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

trait FailedValidationTrait
{
    protected $HTTP_RESPONSE_STATUS_CODE = Response::HTTP_NOT_ACCEPTABLE;

    protected function failedValidation(Validator $validator)
    {
        $errorsData = [];
        $errors = $validator->errors()->messages();
        if ($this->HTTP_RESPONSE_STATUS_CODE === Response::HTTP_NOT_ACCEPTABLE) {
            foreach ($errors as $key => $erro) {
                $errorsData[$key] = $erro[0];
            }
        } else {
            $errorsData = [
                'title' => 'ERRO',
                'message' => $errors[array_keys($errors)[0]][0],
                'type' => 'error',
                'timeout' => 10000
            ];
        }
        throw new HttpResponseException(response()->json($errorsData, $this->HTTP_RESPONSE_STATUS_CODE));
    }
}
