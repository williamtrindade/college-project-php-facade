<?php

namespace App\Services\Facades\Mail\Abstracts;

use App\Services\Facades\Mail\Header;
use App\Services\Facades\Mail\Mail;

/**
 * Class AbstractMailContent
 * @package App\Services\MailFacade
 */
abstract class AbstractMailContent
{
    /** @var Mail $mail */
    protected $mail;

    /** @var Header $mailHeader */
    protected $mailHeader;

    /**
     * @param string $to
     * @return $this
     */
    public final function to(string $to): self
    {
        $this->mail->setTo($to);
        return $this;
    }

    /**
     * @param string $name
     * @param $email
     * @return $this
     */
    public final function from(string $name, $email): self
    {
        $this->mailHeader->addFrom($name, $email);
        return $this;
    }

    /**
     * @param string $message
     * @return $this
     */
    public final function message(string $message): self
    {
        $this->mail->setMessage($message);
        return $this;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public final function subject(string $subject): self
    {
        $this->mail->setSubject($subject);
        return $this;
    }

    /**
     * @param string $cc
     * @return $this
     */
    public function cc(string $cc): self
    {
        $this->mailHeader->withCc($cc);
        return $this;
    }

    /**
     * @param string $cco
     * @return $this
     */
    public function cco(string $cco): self
    {
        $this->mailHeader->withCco($cco);
        return $this;
    }

    /**
     * @param string $bcc
     * @return $this
     */
    public function bcc(string $bcc): self
    {
        $this->mailHeader->withBcc($bcc);
        return $this;
    }


}
