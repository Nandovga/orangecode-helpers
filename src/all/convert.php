<?php
if (!function_exists('EnumToArray')) {
    /**
     * Utilitário para converter um enumerador (enum) em um array associativo com diferentes formatos.
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

if (!function_exists('BuildTree')) {
    /**
     * Realiza a montagem da estrutura de dados para componente TreeList
     * @param array $enum
     * @param string|null $type
     * @return array
     */
    function BuildTree(array $data): array
    {
        $nodes = [];
        foreach ($data as $item)
            $nodes[$item["id"]] = $item;
        $array = [];
        foreach ($data as $item)
            if (isset($nodes[$item["parent"]])){
                $parentNode = &$nodes[$item["parent"]];
                if (!isset($parentNode["children"]))
                    $parentNode["children"] = [];
                $parentNode["children"][] = &$nodes[$item["id"]];
            } else
                $array[] = &$nodes[$item["id"]];
        return $array;
    }
}

if (!function_exists('Mask')) {
    /**
     * Utilizada para aplicar uma máscara a um determinado valor.
     * @param string $value
     * @param string $mask
     * @return string
     */
    function Mask(string $value, string $mask): string
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($value[$k])) {
                    $maskared .= $value[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }
        return $maskared;
    }
}