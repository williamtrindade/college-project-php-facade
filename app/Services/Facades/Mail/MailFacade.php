<?php

namespace App\Services\Facades\Mail;

use App\Services\Facades\Mail\Abstracts\AbstractMailContent;

/**
 * Class MailFacade
 * @package App\Services\Facades\Mail
 */
class MailFacade
{
    /**
     * MailFacade constructor.
     * @return void
     */
    public function __construct()
    {
        $this->mail = new Mail();
    }
}
