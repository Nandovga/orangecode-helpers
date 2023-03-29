<?php
if (!function_exists('calcHorasPeriodo')) {
    /**
     * Retorna a soma das horas por periodo
     * @param array $horas
     * @return float
     */
    function calcHorasPeriodo(array $horas): float
    {
        $contador = null;
        $somaHoras = 0;
        foreach ($horas as $key => $value) {
            if ($key % 2 === 0)
                $contador = (float) horaDecimal($value);
            else
                $somaHoras += ((float) horaDecimal($value) - $contador);
        }
        return count($horas) % 2 === 0 ? $somaHoras : 0;
    }
}

if (!function_exists('isDateInRange')) {
    /**
     * Verfirica se a data está entra as data parametrizadas
     * @param string $date
     * @param string $startDate
     * @param string $endDate
     * @return bool
     * @throws Exception
     */
    function isDateInRange(string $date, string $startDate, string $endDate): bool
    {
        $date = new DateTime($date);
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
        return ($date >= $start && $date <= $end);
    }
}
