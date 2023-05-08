<?php
namespace vendor\codeflame\Validate;

class Validate {

    protected static $rep_cnpj = array('00000000000000','11111111111111','22222222222222','33333333333333','44444444444444','55555555555555','66666666666666','77777777777777','88888888888888','99999999999999');
    protected static $rep_cpf = array('00000000000','11111111111','22222222222','33333333333','44444444444','55555555555','66666666666','77777777777','88888888888','99999999999');

    public static function CPF(string $cpf) : bool 
    {
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $arr_digitos = str_split($cpf);

        if(in_array($cpf, self::$rep_cpf)) return false;
        if(count($arr_digitos) != 11) return false;

        $d1 = $arr_digitos[9];
        $d2 = $arr_digitos[10];

        $resto_d1 = 0;
        $resto_d2 = 0;

        $soma_d1 = 0;
        $soma_d2 = 0;
        
        $j = 10;
        for($i = 0; $i < 9; $i++) {
            $soma_d1 += $arr_digitos[$i] * $j; $j--;
        }

        $j = 11;
        for($i = 0; $i < 10; $i++) {
            $soma_d2 += $arr_digitos[$i] * $j; $j--;
        }

        $resto_d1 = ($soma_d1 * 10) % 11;
        $resto_d2 = ($soma_d2 * 10) % 11;

        $resto_d1 = ($resto_d1 == 10) ? 0 : $resto_d1;
        $resto_d2 = ($resto_d2 == 10) ? 0 : $resto_d2;

        return ($d1 == $resto_d1 && $d2 == $resto_d2) ? true : false;
    }

    public static function CNPJ(string $cnpj) : bool
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $arr_digitos = str_split($cnpj);

        if(in_array($cnpj, self::$rep_cnpj)) return false;
        if(count($arr_digitos) != 14) return false;
        
        $d1 = $arr_digitos[12];
        $d2 = $arr_digitos[13];

        $resto_d1 = 0;
        $resto_d2 = 0;

        $soma_d1 = 0;
        $soma_d2 = 0;

        $j = 5;
        for($i = 0; $i < 4; $i++) {
            $soma_d1 += $arr_digitos[$i] * $j; $j--;
        }
        
        $j = 9;
        for($i; $i < 12; $i++) {
            $soma_d1 += $arr_digitos[$i] * $j; $j--;
        }

        $j = 6;
        for($i = 0; $i < 5; $i++) {
            $soma_d2 += $arr_digitos[$i] * $j; $j--;
        }
        
        $j = 9;
        for($i; $i < 13; $i++) {
            $soma_d2 += $arr_digitos[$i] * $j; $j--;
        }

        $resto_d1 = ($soma_d1 % 11);
        $resto_d2 = ($soma_d2 % 11);

        if($resto_d1 == 1 || $resto_d1 == 0) $resto_d1 = 0;
        if($resto_d1 == 10 || $resto_d1 == 9 || $resto_d1 == 8 || $resto_d1 == 7 || $resto_d1 == 6 || $resto_d1 == 5 || $resto_d1 == 4 || $resto_d1 == 3 || $resto_d1 == 2) $resto_d1 = (11 - $resto_d1);
        if($resto_d2 == 1 || $resto_d2 == 0) $resto_d2 = 0;
        if($resto_d2 == 10 || $resto_d2 == 9 || $resto_d2 == 8 || $resto_d2 == 7 || $resto_d2 == 6 || $resto_d2 == 5 || $resto_d2 == 4 || $resto_d2 == 3 || $resto_d2 == 2) $resto_d2 = (11 - $resto_d2);

        return ($d1 == $resto_d1 && $d2 == $resto_d2) ? true : false;
    }

    public static function Email(string $email) : bool
    {
        return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false;
    }
}
