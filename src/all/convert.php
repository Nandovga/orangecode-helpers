<?php
if (!function_exists('EnumToArray')) {
    /**
     * Realiza a conversão de um enumerado para array
     * @param array $enum
     * @param string|null $type
     * @return array
     */
    function EnumToArray(array $enum, string $type = null): array
    {
        $types = [];
        foreach ($enum as $key => $item) {
            if (empty($type)) {
                $types[] = $item;
            } elseif ($type === "select") {
                $types[$key]["id"] = $item;
                $types[$key]["name"] = $item;
            } elseif ($type === "radio") {
                $types[$key]["value"] = $item;
                $types[$key]["legend"] = $item;
            }
        }
        return $types;
    }
}
