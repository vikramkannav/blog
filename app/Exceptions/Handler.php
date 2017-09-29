<?php

namespace App\Exceptions;

use App\Mail\ErrorMail;
use Exception;
use App\User;
use App\Notifications\SlackNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */

//============== function is used for the slack exception notification =======

    public function report(Exception $exception)
    {

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
//===========================This function is add for the slack notification==========


    public function sendErrorsToSlack($exception)
    {
        $user= (new User)->notify(new SlackNotification($exception));

    }

//======================function for exception mail==============
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */

    public function sendErrorsToMail($request,$e)  // This function is used for the error mail
    {
        $exceptionMsg = 'ErrorException: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();

        $exceptionMsg1 = 'Request Url: ' . $request->fullUrl();

        $exceptionMsg2 = 'Request object: ' . request();

        $exceptionMsg4 = 'Request Trace: ' . $e->getTraceAsString();

        $ex = $exceptionMsg4;
        $ex = preg_replace('/#/', '<br/>$0$1', $ex);
        Mail::send('emails.exception', ['error_message' => $exceptionMsg, 'error_message1' => $exceptionMsg1,'error_message2' => $exceptionMsg2, 'error_trace' => $ex], function($m)use ($e){
            $m->from(env('EXCEPTION_SEND_FROM'));
            $m->to(env('EXCEPTION_SEND_TO'))->subject('Exception from '.'{'.env('APP_ENV').'} '.env('EXCEPTION_USER_NAME').$e->getMessage());
        });

    }


    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
       $this->sendErrorsToMail($request,$exception);
        $this->sendErrorsToSlack($exception);
        return parent::render($request, $exception);
    }

}
