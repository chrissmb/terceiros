<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Cpf implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) != 11) return false;
        if (!preg_match('/\b\d{11}\b/', $value)) return false;
        if ($this->elementosIguais($value)) return false;
        
        $aux = 0;
        for ($i = 0; $i < 9; $i++) {
        	$aux += $value[$i] * (10 - $i);
        }
        $digito1 = ($aux * 10) % 11;
        if ($digito1 == 10)
			$digito1 = 0;
		if ($digito1 != $value[9])
			return false;
		
		$aux = 0;
		for ($i = 0; $i < 10; $i++) {
			$aux += $value[$i] * (11 - $i);
		}
		$digito2 = ($aux * 10) % 11;
		if ($digito2 == 10)
			$digito2 = 0;
		if ($digito2 != $value[10])
			return false;
		else
			return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CPF inválido.';
    }
    
    private function elementosIguais($str) {
        $length = strlen($str);
        if ($length <= 1) return true;
        for ($i = 1; $i < $length; $i++) {
            if ($str[$i] != $str[$i - 1]) return false;
        }
        return true;
    }
}