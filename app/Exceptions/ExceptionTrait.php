<?php
namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{

    public function apiException($request, $e)
    {
        if ($request->expectsJson()) {
            if ($this->isModel($e)) {
                return $this->modelResponse($e);
            }

            if ($this->isHttp($e)) {
                return $this->httpResponse($e);
            }
        }
    }
    
    private function isModel($exception) {
        return $exception instanceof ModelNotFoundException;
    }
    
    private function isHttp($exception) {
        return $exception instanceof NotFoundHttpException;
    }
    
    private function modelResponse($exception) {
        return response()->json([
            'errors' => 'Product Model Not Found'
        ], Response::HTTP_NOT_FOUND);
    }
    
    private function httpResponse($exception) {
        return response()->json([
            'errors' => 'Bad URI'
        ], Response::HTTP_NOT_FOUND);
    }
    
}

