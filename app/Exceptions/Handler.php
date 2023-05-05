<?php
//
//namespace App\Exceptions;
//
////use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Illuminate\Support\Facades\Response;
//use Throwable;
//use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
//use Exception;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use Tymon\JWTAuth\Exceptions\TokenExpiredException;
//use Tymon\JWTAuth\Exceptions\TokenInvalidException;
//
//class Handler
//{
//    /**
//     * The list of the inputs that are never flashed to the session on validation exceptions.
//     *
//     * @var array<int, string>
//     */
//    protected $dontFlash = [
//        'current_password',
//        'password',
//        'password_confirmation',
//    ];
//
//    /**
//     * Register the exception handling callbacks for the application.
//     */
//    public function register(): void
//    {
////        $this->reportable(function (Throwable $e) {
////            //
////        });
//        $this->renderable(function(TokenInvalidException $e, $request){
//            return Response::json(['error'=>'Invalid token'],401);
//        });
//        $this->renderable(function (TokenExpiredException $e, $request) {
//            return Response::json(['error'=>'Token has Expired'],401);
//        });
//
//        $this->renderable(function (JWTException $e, $request) {
//            return Response::json(['error'=>'Token not parsed'],401);
//        });
//    }
//
//    public function render($request, Exception $exception)
//    {
//        if ($request->is('api/*') || $request->expectsJson() || $request->is('webhook/*')) {
//            if ($exception instanceof Tymon\JWTAuth\Exceptions\TokenInvalidExceptio) {
//
//                return [
//                    'errors' => $exception->getMessage(),
//                    'exception' => 'your message'
//
//                ];
//
//            }
//        }
//
//    }
//}


namespace App\Exceptions;

use Exception;
use Throwable;
use Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // $this->reportable(function (Throwable $e) {
        //     //
        // });
        $this->renderable(function (TokenInvalidException $e, $request) {
            return Response::json(['error' => 'Invalid token'], 401);
        });
        $this->renderable(function (TokenExpiredException $e, $request) {
            return Response::json(['error' => 'Token has Expired'], 401);
        });

        $this->renderable(function (JWTException $e, $request) {
            return Response::json(['error' => 'Token not parsed'], 401);
        });

    }
}
