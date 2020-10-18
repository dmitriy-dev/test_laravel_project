<?php


namespace Core\BankIntegration;


/**
 * Class ResponseInterface
 * @package Core\BankIntegration
 */
class ResponseStructure
{
    /**
     * @var string
     */
    private string $status;

    /**
     * @var int
     */
    private int $code;

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }
}
