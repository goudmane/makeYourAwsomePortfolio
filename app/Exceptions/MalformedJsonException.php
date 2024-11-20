<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class MalformedJsonException extends Exception
{
    public function render($request): JsonResponse
    {
        return response()->json([
            'message' => 'Malformed JSON in the request body. Please ensure your JSON is properly formatted.',
        ], 400);
    }
}
