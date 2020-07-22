<?php

namespace App\Services\Facades\Mail;

/**
 * Class SMTPConfig
 * @package App\Services\Facades\Mail
 */
class SMTPConfig
{
    /** @var string $host */
    private $host;

    /** @var string $port */
    private $port;

    /** @var string $username */
    private $username;

    /** @var string $password */
    private $password;

    /** @var string $encryption */
    private $encryption;

    /**
     * SMTPConfig constructor.
     * @param string|null $host
     * @param string|null $port
     * @param string|null $username
     * @param string|null $password
     * @param string|null $encryption
     */
    public function __construct(
        string $host = null,
        string $port = null,
        string $username = null,
        string $password = null,
        string $encryption = null)
    {
        $this->host       = $host ?: env('MAIL_HOST');
        $this->port       = $port ?: env('MAIL_PORT') ;
        $this->username   = $username ?: env('MAIL_USERNAME');
        $this->password   = $password ?: env('MAIL_PASSWORD');
        $this->encryption = $encryption ?: env('MAIL_ENCRYPTION');
    }

    /**
     * @return string
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): ?string
    {
        return $this->port;
    }

    /**
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEncryption(): ?string
    {
        return $this->encryption;
    }
}
