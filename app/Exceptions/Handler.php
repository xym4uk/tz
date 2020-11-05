<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ApiException) {
            $response['message'] = $exception->getMessage();
            $response['error']   = $exception->getCode() != 0 ? $exception->getCode() : 500;

            return response()->json($response);
        }

        // не валидные данные
        if ($exception instanceof ValidationException) {
            $message = '';

            foreach ($exception->errors() as $error) {
                foreach ($error as $rule) {
                    $message .= '. ' . $rule;
                }
            }
            $response['message'] = substr($message, 2);
            $response['error']   = 400;
            $response['success'] = false;

            return response()->json($response);
        }

        if ($exception instanceof AuthenticationException) {
            $response['message'] = $exception->getMessage();
            $response['error']   = 401;
            $response['success'] = false;
            return response()->json($response);
        }

        $response = ['success' => false, 'error' => 500, 'message' => 'Что-то пошло не так'];
        return response()->json($response);
    }
}
