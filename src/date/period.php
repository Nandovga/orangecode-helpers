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
