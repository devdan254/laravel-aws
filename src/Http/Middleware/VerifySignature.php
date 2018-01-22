<?php

namespace Laravel\Aws\Http\Middleware;

use Aws\Sns\MessageValidator;
use Closure;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Laravel\Aws\Sns\Message;

class VerifySignature
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $message = Message::fromSymfonyRequest($request);

            (new MessageValidator())->validate($message);

        } catch (Exception $exception) {
            Log::debug($exception->getMessage() . PHP_EOL . $exception->getTraceAsString());

            return response(Response::$statusTexts[Response::HTTP_BAD_REQUEST], Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
