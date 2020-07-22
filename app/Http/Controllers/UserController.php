<?php

namespace App\Http\Controllers;

use App\Services\Facades\Mail\MailFacade;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function mail(Request $request)
    {
        $mail = new MailFacade();
        $mail->to('Wil', $request->to)
            ->from('William', $request->from)
            ->subject($request->subject)
            ->message($request->message)
            ->cc('tests@ggg.net')
            ->bcc('willafdsfssiam@fsdd.net')
            ->send();
        return response()->json($mail->getStatus());
    }
}
