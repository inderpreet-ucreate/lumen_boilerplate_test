<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];
    
    public function report(Exception $e) {
        parent::report($e);
    }
    
    public function render($request, Exception $e) {
        if(!config('settings.json_exception_reporting') || !$request->wantsJson() || $e instanceof ValidationException)
            return parent::render($request, $e);
        
        $response = ['message' => $e->getMessage()];
        
        if($e instanceof HttpException) {
            $response['status'] = $e->getStatusCode();
            if(empty($response['message']))
                $response['message'] = Response::$statusTexts[$e->getStatusCode()];
        }
        
        if(env('APP_DEBUG'))
            $response['debug'] = [
                'exception' => get_class($e),
                'trace'     => preg_split("/\r\n|\n|\r/", $e->getTraceAsString()),
            ];
        
        return new JsonResponse(['error' => $response], $response['status'] ?? 400);
    }
}
