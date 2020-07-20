<?php

namespace App\Services\Facades\Mail;

use App\Services\Facades\Mail\Abstracts\AbstractMailContent;

/**
 * Class MailFacade
 * @package App\Services\Facades\Mail
 */
class MailFacade extends AbstractMailContent
{
    /**
     * MailFacade constructor.
     * @return void
     */
    public function __construct()
    {
        $this->mail = new Mail();
        $this->mailHeader = new Header();
    }

    /**
     * @return bool
     */
    public final function send(): bool
    {
        $this->mailHeader->setContent($this->mailHeader->getContent() . 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n");
        $this->mail->setHeader($this->mailHeader);
        $this->mail->send();
        return $this->mail->getStatus();
    }

    /**
     * @return Mail
     */
    public function getMail(): Mail
    {
        return $this->mail;
    }

    /**
     * @param Mail $mail
     */
    public function setMail(Mail $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return Header
     */
    public function getMailHeader(): Header
    {
        return $this->mailHeader;
    }

    /**
     * @param Header $mailHeader
     */
    public function setMailHeader(Header $mailHeader): void
    {
        $this->mailHeader = $mailHeader;
    }
}
