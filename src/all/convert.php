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
    function BuildTree(array $array, string $attr = "parent"): array
    {
        //Agrupa os dados pelo $attr
        $a = array_reduce($array, function ($arr, $item) use ($attr) {
            $value = $item[$attr];
            if (!isset($arr[$value]))
                $arr[$value] = array();
            $arr[$value][] = $item;
            return $arr;
        }, array());
        foreach ($a as $key => $value)
            foreach ($value as $v)
                $result[$key][] = $v;

        $build = [];
        foreach ($array as $key => $value)
            if ($value[$attr] === null)
                $build[] = $value;

        /**
         * Realiza a montage da estrutura de dados
         * @param array $build
         * @param array $result
         * @return array
         */
        function genereteTree(array $build, array $result): array
        {
            $arr = [];
            foreach ($build as $key => $value) {
                $arr[$key] = $value;
                if (isset($result[$value["id"]]))
                    $arr[$key]["children"] = genereteTree($result[$value["id"]], $result);
                else
                    return $build;
            }
            return $arr;
        }

        return genereteTree($build, $result);
    }
}
