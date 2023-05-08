<?php
namespace vendor\codeflame\Validate;

class Validate {

    protected static $rep_cnpj = array('00000000000000','11111111111111','22222222222222','33333333333333','44444444444444','55555555555555','66666666666666','77777777777777','88888888888888','99999999999999');
    protected static $rep_cpf = array('00000000000','11111111111','22222222222','33333333333','44444444444','55555555555','66666666666','77777777777','88888888888','99999999999');

    protected static $d1 = 0, $d2 = 0, $resto_d1 = 0, $resto_d2 = 0, $soma_d1 = 0, $soma_d2 = 0;

    public static function CPF(string $cpf) : bool 
    {
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $arr_digitos = str_split($cpf);

        if(in_array($cpf, self::$rep_cpf)) return false;
        if(count($arr_digitos) != 11) return false;

        self::$d1 = $arr_digitos[9];
        self::$d2 = $arr_digitos[10];
        
        $j = 10;
        for($i = 0; $i < 9; $i++) {
            self::$soma_d1 += $arr_digitos[$i] * $j; $j--;
        }

        $j = 11;
        for($i = 0; $i < 10; $i++) {
            self::$soma_d2 += $arr_digitos[$i] * $j; $j--;
        }

        self::$resto_d1 = (self::$soma_d1 * 10) % 11;
        self::$resto_d2 = (self::$soma_d2 * 10) % 11;

        self::$resto_d1 = (self::$resto_d1 == 10) ? 0 : self::$resto_d1;
        self::$resto_d2 = (self::$resto_d2 == 10) ? 0 : self::$resto_d2;

        return (self::$d1 == self::$resto_d1 && self::$d2 == self::$resto_d2) ? true : false;
    }

    public static function CNPJ(string $cnpj) : bool
    {
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $arr_digitos = str_split($cnpj);

        if(in_array($cnpj, self::$rep_cnpj)) return false;
        if(count($arr_digitos) != 14) return false;

        self::$d1 = $arr_digitos[12];
        self::$d2 = $arr_digitos[13];

        $j = 5;
        for($i = 0; $i < 4; $i++) {
            self::$soma_d1 += $arr_digitos[$i] * $j; $j--;
        }
        
        $j = 9;
        for($i; $i < 12; $i++) {
            self::$soma_d1 += $arr_digitos[$i] * $j; $j--;
        }

        $j = 6;
        for($i = 0; $i < 5; $i++) {
            self::$soma_d2 += $arr_digitos[$i] * $j; $j--;
        }
        
        $j = 9;
        for($i; $i < 13; $i++) {
            self::$soma_d2 += $arr_digitos[$i] * $j; $j--;
        }

        self::$resto_d1 = (self::$soma_d1 % 11);
        self::$resto_d2 = (self::$soma_d2 % 11);

        if(self::$resto_d1 == 1 || self::$resto_d1 == 0) self::$resto_d1 = 0;
        if(self::$resto_d1 == 10 || self::$resto_d1 == 9 || self::$resto_d1 == 8 || self::$resto_d1 == 7 || self::$resto_d1 == 6 || self::$resto_d1 == 5 || self::$resto_d1 == 4 || self::$resto_d1 == 3 || self::$resto_d1 == 2) self::$resto_d1 = (11 - self::$resto_d1);
        if(self::$resto_d2 == 1 || self::$resto_d2 == 0) self::$resto_d2 = 0;
        if(self::$resto_d2 == 10 || self::$resto_d2 == 9 || self::$resto_d2 == 8 || self::$resto_d2 == 7 || self::$resto_d2 == 6 || self::$resto_d2 == 5 || self::$resto_d2 == 4 || self::$resto_d2 == 3 || self::$resto_d2 == 2) self::$resto_d2 = (11 - self::$resto_d2);

        return (self::$d1 == self::$resto_d1 && self::$d2 == self::$resto_d2) ? true : false;
    }
}
