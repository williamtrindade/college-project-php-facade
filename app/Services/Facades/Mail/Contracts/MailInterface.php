<?php

namespace App\Services\Facades\Mail\Contracts;

/**
 * Interface MailInterface
 * @package App\Services\Facades\Mail\Contracts
 */
interface MailInterface
{
    /**
     * @return mixed
     */
    public function send();
}
