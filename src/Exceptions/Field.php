<?php

namespace Orangecode\Helpers\Exceptions;
use Illuminate\Http\JsonResponse;

class Field extends \Exception
{
    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return response()->json([
            "errors" => json_encode($this->message)
        ], $this->getCode());
    }
}
