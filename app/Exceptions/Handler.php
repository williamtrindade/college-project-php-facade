<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }


    /**
     * @param Request $request
     * @param Throwable $e
     * @return JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     * @throws Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof AuthenticationException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_UNAUTHORIZED]
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($e instanceof ModelNotFoundException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_NOT_FOUND]
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof ModelNotFoundException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_NOT_FOUND]
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof NotFoundHttpException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_NOT_FOUND]
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof UnauthorizedException) {
            return new JsonResponse([
                'success' => false,
                'message' => $e->getMessage()
            ], Response::HTTP_UNAUTHORIZED);
        }

//        if ($e instanceof ForbiddenException) {
//            return new JsonResponse([
//                'success' => false,
//                'message' => JsonResponse::$statusTexts[Response::HTTP_FORBIDDEN]
//            ], Response::HTTP_FORBIDDEN);
//        }

        if ($e instanceof ValidationException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_UNPROCESSABLE_ENTITY],
                'data' => $e->getMessages()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($e instanceof BadRequestHttpException) {
            return new JsonResponse([
                'success' => false,
                'message' => JsonResponse::$statusTexts[Response::HTTP_BAD_REQUEST],
                'data' => [
                    'error' => $e->getMessage()
                ]
            ], Response::HTTP_BAD_REQUEST);
        }

        if ($e instanceof HttpException) {
            return new JsonResponse([
                'success' => false,
                'message' => $e->getMessage() ? $e->getMessage() : JsonResponse::$statusTexts[$e->getStatusCode()]
            ], $e->getStatusCode());
        }
        return parent::render($request, $e);
    }
}
