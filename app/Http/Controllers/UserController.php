<?php

namespace App\Http\Controllers;

use App\Services\Facades\Mail\MailFacade;
use App\Services\Facades\Mail\MailFacade;
use App\Services\Facades\Mail\MailFacade;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller, MailFacade, MailFacade
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function mail(Request $request)
    {
        $mail = new MailFacade();
        $mail->to('Wil', 'william@odig.net')
            ->from('William', 'william@odig.net')
            ->subject($request->subject)
            ->message('Hello')
            ->cc('william@odig.net')
            ->bcc('willassiam@odig.net')
            ->send();
        return response()->json($mail->getStatus());
    }
}
