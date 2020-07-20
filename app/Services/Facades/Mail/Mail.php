<?php

namespace App\Services\Facades\Mail;

use App\Services\Facades\Mail\Contracts\MailInterface;

/**
 * Class MailFacade
 * @package App\Services\MailFacade
 */
class Mail implements MailInterface
{
    /** @var int */
    const ACCEPTED = 1;

    /** @var int */
    const NOT_ACCEPTED = 2;

    /** @var int $status */
    private $status;

    /** @var $from */
    private $from;

    /** @var string $to */
    private $to;

    /** @var string $subject */
    private $subject;

    /** @var string $message */
    private $message;

    /** @var Header $header */
    private $header;

    /**
     * MailFacade constructor.
     */
    public function __construct()
    {
        $this->setStatus(self::NOT_ACCEPTED);
    }

    /**
     * @return self
     */
    public function send(): self
    {
        if ($this->getHeader()) {
            $this->setStatus(
                mail($this->getTo(), $this->getSubject(), $this->getMessage(), $this->getHeader()->getContent())
            );
        } else {
            $this->setStatus(
                mail($this->getTo(), $this->getSubject(), $this->getMessage())
            );
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    private function setStatus(bool $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from): void
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return Header
     */
    public function getHeader(): Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     */
    public function setHeader(Header $header): void
    {
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $this->header = $header;
    }
}
