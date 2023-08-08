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

if (!function_exists('BuildTreeExists')) {
    /**
     * Realiza a montagem da árvore de dados somente com os dados selecionáveis
     * @param array $data
     * @return array
     */
    function BuildTreeExists(array $data): array
    {
        $i = 0;
        while (count($data) > 0 && $i < count($data)) {
            $search = array_search($data[$i]["id"], array_column($data, "parent"));
            if (!$search && !$data[$i]["selected"]) {
                unset($data[$i]);
                $data = array_values($data);
                $i = 0;
            } else
                $i++;
        }
        return array_values($data);
    }
}
