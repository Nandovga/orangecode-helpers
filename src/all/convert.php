<?php
if (!function_exists('EnumToArray')) {
    /**
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
    function BuildTree(array $data)
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
