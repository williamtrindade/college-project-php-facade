<?php

namespace App\Services\Facades\Mail;

use App\Services\Facades\Mail\Contracts\MailInterface;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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

    /** @var array $to */
    private $to;

    /** @var string $subject */
    private $subject;

    /** @var string $message */
    private $message;

    /** @var Header $header */
    private $header;

    /** @var SMTPConfig $smtpConfig*/
    private $smtpConfig;

    /**
     * MailFacade constructor.
     * @param Header $header
     * @param SMTPConfig $smtpConfig
     */
    public function __construct(Header $header, SMTPConfig $smtpConfig)
    {
        $this->setStatus(self::NOT_ACCEPTED);
        $this->header = $header;
        $this->smtpConfig = $smtpConfig;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function send(): self
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host       = $this->smtpConfig->getHost();
        $mail->SMTPAuth   = true;
        $mail->Username   = $this->smtpConfig->getUsername();
        $mail->Password   = $this->smtpConfig->getPassword();
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $this->smtpConfig->getPort();
        $mail->Body = $this->getMessage();

        // Add from
        try {
            $mail->setFrom($this->getHeader()->getFrom()[1], $this->getHeader()->getFrom()[0]);
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
        // Add to
        foreach ($this->getTo() as $to) {
            try {
                $mail->addAddress($to['email'], $to['name']);
            } catch (Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }
        // Add cc
        foreach ($this->getHeader()->getCc() as $cc) {
            $mail->addCC($cc);
        }
        // Add bcc
        foreach ($this->getHeader()->getBcc() as $bcc) {
            $mail->addBcc($bcc);
        }
        $mail->send();
        $this->setStatus(self::ACCEPTED);
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    private function setStatus(int $status)
    {
        $this->status = $status;
    }

    /**
     * @return array|null
     */
    public function getTo(): ?array
    {
        return $this->to;
    }

    /**
     * @param array $to
     */
    public function setTo($to): void
    {
        $this->to = $to;
    }

    /**
     * @param array $to
     */
    public function addTo(array $to): void
    {
        $array = $this->getTo() ?: [];
        array_push($array, ['name' => $to[0], 'email' => $to[1]]);
        $this->setTo($array);
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
    public function getHeader(): ?Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     */
    public function setHeader(Header $header): void
    {
        $this->header = $header;
    }

    /**
     * @return SMTPConfig
     */
    public function getSmtpConfig(): SMTPConfig
    {
        return $this->smtpConfig;
    }

    /**
     * @param SMTPConfig $smtpConfig
     */
    public function setSmtpConfig(SMTPConfig $smtpConfig): void
    {
        $this->smtpConfig = $smtpConfig;
    }
}
