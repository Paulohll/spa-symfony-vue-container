<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof HttpException) {
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];
            return $this->errorResponse($message, $code);
        }

        if ($exception instanceof  ModelNotFoundException) {
            $code = Response::HTTP_NOT_FOUND;
            $model = strtolower(class_basename($exception->getModel()));
            $message = "{$model} not exist with the given id";
            return $this->errorResponse($message, $code);
        }

        if ($exception instanceof  AuthorizationException) {
            $code = Response::HTTP_FORBIDDEN;
            $message = $exception->getMessage();
            return $this->errorResponse($message, $code);
        }

        if ($exception instanceof  AuthorizationException) {
            $code = Response::HTTP_UNAUTHORIZED;
            $message = $exception->getMessage();
            return $this->errorResponse($message, $code);
        }

        if ($exception instanceof  ValidationException) {
            $code = Response::HTTP_UNPROCESSABLE_ENTITY;
            $message = $exception->validator->errors()->getMessages();
            return $this->errorResponse($message, $code);
        }

        if (env('APP_DEBUG', false)){
            return parent::render($request, $exception);
        }

        $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        $message = "Unexpected error, try later";
        return $this->errorResponse($message, $code);
    }
}
