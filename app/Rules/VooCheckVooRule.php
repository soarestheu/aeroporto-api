<?php

namespace App\Rules;

use App\Models\Aeroporto;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class VooCheckVooRule implements ValidationRule
{
    private $origem, $destino;

    public function __construct($origem, $destino)
    {
        $this->origem   = $origem;
        $this->destino  = $destino;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->origem == $this->destino) {
            
            $fail("Aeroporto de Origem e Destino não podem ser o mesmo!");
        }

        if($this->getCity($this->origem) == $this->getCity($this->destino)){
            $fail("Não é possivel realizar uma viagem para a mesma cidade. Gentileza escolher um novo aeroporto.");
        }

    }

    private function getCity($cdCidade)
    {
        return Aeroporto::find($cdCidade)->cd_cidade;
    }
}
