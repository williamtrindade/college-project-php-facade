<?php

namespace App\Services\Facades\Mail;

/**
 * Class Header
 * @package App\Services\MailFacade
 */
class Header
{
    /** @var string $content */
    private $content;

    /**
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content ?: "";
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @param string $cc
     * @return $this
     */
    public function withCc(string $cc): self
    {
        $new_header = $this->getContent() . "Cc: {$cc}\r\n";
        $this->setContent($new_header);
        return $this;
    }

    /**
     * @param string $cco
     * @return $this
     */
    public function withCco(string $cco): self
    {
        $new_header = $this->getContent() . "Cco: {$cco}\r\n";
        $this->setContent($new_header);
        return $this;
    }

    /**
     * @param string $bcc
     * @return $this
     */
    public function withBcc(string $bcc): self
    {
        $new_header = $this->getContent() . "Bcc: {$bcc}\r\n";
        $this->setContent($new_header);
        return $this;
    }

    /**
     * @param string $name
     * @param string $email
     * @return $this
     */
    public function addFrom(string $name, string $email): self
    {
        $new_header = $this->getContent() . "From: {$name} <{$email}>\r\n";
        $this->setContent($new_header);
        return $this;
    }
}
