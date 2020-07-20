<?php

namespace App\Http\Controllers;

use App\Services\Facades\Mail\MailFacade;
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
     */
    public function mail(Request $request)
    {
        $mail = new MailFacade();
        $mail->to($request->to)
            ->from('William', 'william@odig.net')
            ->subject($request->subject)
            ->message('Hello')
            ->send();
        return response()->json($mail->getMail()->getStatus());
    }
}
