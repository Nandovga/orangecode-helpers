<?php
if (!function_exists("decimalHoras")){
    /**
     * Converte as horas em decimal para horas formatadas
     * @param float $decimal
     * @return string
     */
    function decimalHoras(float $decimal): string
    {
        $decimal = round($decimal, 2);
        $division = explode('.', $decimal);
        $horas = $division[0];
        if (isset($division[1])) {
            $min = str_pad($division[1], 2, '0', STR_PAD_RIGHT);
            $min = round(($min * 60) / 100, 0, PHP_ROUND_HALF_UP);
        } else
            $min = 0;
        $horas = str_pad($horas, 2, '0', STR_PAD_LEFT);
        $min = str_pad($min, 2, '0', STR_PAD_LEFT);
        return $horas . ':' . $min;
    }
}

if (!function_exists('horaDecimal')) {

    /**
     * Converte as horas no formato de string para decimal
     * @param string $horas
     * @return null|string
     */
    function horaDecimal(string $horas, int $decimais = 2): ?string
    {
        if (!strstr($horas, ':'))
            return null;
        $arrHoras = explode(':', $horas);
        $valorHoras = (int)$arrHoras[0];
        $valorMinutos = (int)$arrHoras[1];
        $minutoDecimal = $valorMinutos / 60;
        return number_format($valorHoras + $minutoDecimal, $decimais, '.', '');
    }
}

if (!function_exists('horasMin')) {

    /**
     * Converte as Horas em string para minutos
     * @param string $horas
     * @return int
     */
    function horasMin(string $valor): int
    {
        if (strstr($valor, ":")) {
            $arrayValor = explode(":", $valor);
            $valorMin = (int)$arrayValor[1];
            $valorHora = (int)$arrayValor[0];
            return (int)(($valorHora * 60) + $valorMin);
        } else
            return 0;
    }
}

if (!function_exists('minHoras')) {

    /**
     * Converte os minutos para horas formatadas
     * @param string $horas
     * @return int
     */
    function minHoras(int|float $valor): string
    {
        $valorDivisao = number_format($valor / 60, 2, ',', ''); // valor decimal
        $arrayValor = explode(",", $valorDivisao);
        $valorHora = $arrayValor[0];
        $valorMin = round(($arrayValor[1] * 60) / 100);
        if (strlen($valorHora) == 1) {
            $valorHora = "0" . $valorHora;
        }
        if (strlen($valorMin) < 2) {
            $valorMin = "0" . $valorMin;
        }
        return $valorHora . ":" . $valorMin;
    }
}

if (!function_exists('secondsHoras')) {
    /**
     * Converte segundos para horas
     * @param int $seconds
     * @return string
     */
    function secondsHoras(int $seconds): string
    {
        $minutes = $seconds / 60;
        return floatval(number_format($minutes / 60, 2, '.', ''));
    }
}
