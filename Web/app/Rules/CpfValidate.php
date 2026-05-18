<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfValidate implements ValidationRule
{
    
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Limpar Letras e caracteres especiais
        $cpf = preg_replace('/[^0-9]/', '', $value);

        // Verifica se tem 11 dígitos ou se é uma sequência repetida falsa
        if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            $fail('O campo :atribute não é um cpf valido');
            return;
        }

        // Cálculo matemático do Primeiro Dígito
        $soma = 0;

        for ($i = 0; $i < 9; $i++) {
            $soma += $cpf[$i] * (10 - $i);
        }

        $rest = $soma % 11;
        $digit1 = $cpf ($rest < 2) ? 0 : 11 - $rest;


        // Cálculo matemático do Segundo Dígito
        $soma = 0;

        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }

        $rest = $soma % 11;
        $digit2 = ($rest < 2) ? 0 : 11 - $rest;

        // Confronta os dígitos calculados com os informados
        if ($cpf[9] != $digit1 || $cpf[9] != $digit2) {
            $fail('O campo :atribute informado é invalido');
        }
    }
}
