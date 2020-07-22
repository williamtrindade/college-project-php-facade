<?php

namespace App\Services\Facades\Mail;

use App\Services\Facades\Mail\Abstracts\AbstractMailContent;
use App\Services\Facades\Mail\MailFacade;

/**
 * Class Header
 * @package App\Services\MailFacade
 */
class Header extends AbstractMailContent
{
    /** @var array $from */
    private $from;

    /** @var array $cc */
    private $cc = [];

    /** @var array $bcc */
    private $bcc = [];

    /**
     * @return array
     */
    public function getFrom(): array
    {
        return $this->from;
    }

    /**
     * @param array $from
     */
    public function setFrom(array $from): void
    {
        $this->from = $from;
    }

    /**
     * @return array
     */
    public function getCc(): array
    {
        return $this->cc;
    }

    /**
     * @param array $cc
     */
    public function setCc(array $cc): void
    {
        $this->cc = $cc;
    }

    /**
     * @return array
     */
    public function getBcc(): array
    {
        return $this->bcc;
    }

    /**
     * @param array $bcc
     */
    public function setBcc(array $bcc): void
    {
        $this->bcc = $bcc;
    }
}
