<?php

namespace App\Services\Facades\Mail;

use Exception;

/**
 * Class MailFacade
 * @package App\Services\Facades\Mail
 */
class MailFacade
{
    /** @var Mail $mail */
    protected $mail;

    /**
     * MailFacade constructor.
     * @return void
     */
    public function __construct()
    {
        $this->mail = new Mail();
    }

    /**
     * @param string $name
     * @param string $email
     * @return $this
     */
    public final function to(string $name, string $email): self
    {
        $this->mail->addTo([$name, $email]);
        return $this;
    }

    /**
     * @param string $name
     * @param string $email
     * @return $this
     */
    public final function from(string $name, string $email): self
    {
        $this->mail->getHeader()->setFrom([$name, $email]);
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
        $array = $this->mail->getHeader()->getCc();
        array_push($array, $cc);
        $this->mail->getHeader()->setCc($array);
        return $this;
    }

    /**
     * @param string $bcc
     * @return $this
     */
    public function bcc(string $bcc): self
    {
        $array = $this->mail->getHeader()->getCc();
        array_push($array, $bcc);
        $this->mail->getHeader()->setBcc($array);
        return $this;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public final function send(): bool
    {
        $this->mail->send();
        return $this->mail->getStatus();
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->mail->getStatus();
    }
}
