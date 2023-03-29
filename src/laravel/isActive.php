<?php
if (!function_exists("isActive")){
    /**
     * Verifica se a rota parametrizada está sendo acessada
     * @param string|array $route
     * @param string $class
     * @return string
     */
    function isActive(string | array $route, string $class = 'active'): string
    {
        $url = \Illuminate\Support\Facades\Request::url();
        if (is_array($route))
            return in_array($url, $route) ? $class : "";
        return $url === $route ? $class : "";
    }
}
