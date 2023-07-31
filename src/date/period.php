<?php
if (!function_exists('sumHours')) {
    /**
     * @param array $hours
     * @return float
     */
    function sumHours(array $hours): float
    {
        if (count($hours) % 2 !== 0) return 0;
        $count = null;
        $sumHours = 0;
        foreach ($hours as $key => $value)
            if ($key % 2 === 0)
                $count = hoursToDecimal($value);
            else
                $sumHours += (hoursToDecimal($value) - $count);
        return $sumHours;
    }
}

if (!function_exists('isDateInRange')) {
    /**
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

if (!function_exists('getMonth')) {

    /**
     * Retorna o mês de acordo com paramentro
     * @param int $month
     * @return string
     */
    function getMonth(int $month): string
    {
        switch ($month){
            case 1: return 'Janeiro';
            case 2: return 'Fevereiro';
            case 3: return 'Março';
            case 4: return 'Abril';
            case 5: return 'Maio';
            case 6: return 'Junho';
            case 7: return 'Julho';
            case 8: return 'Agosto';
            case 9: return 'Setembro';
            case 10: return 'Outubro';
            case 11: return 'Novembro';
            case 12: return 'Dezembro';
            default: return '';
        }
    }
}





