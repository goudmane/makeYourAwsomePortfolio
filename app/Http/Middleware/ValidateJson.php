<?php

namespace App\Http\Middleware;

use App\Exceptions\MalformedJsonException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateJson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isJson()) {
            $content = $request->getContent();

            if (!empty($content) && is_null(json_decode($content, true))) {
                $error = json_last_error_msg();
                throw new MalformedJsonException("Malformed JSON: $error");
            }
        }

        return $next($request);
    }
}

