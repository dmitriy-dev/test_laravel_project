<?php


namespace Core\BankIntegration;

/**
 * Interface IntegrationInterface
 * @package Core\BankIntegration
 */
interface IntegrationInterface
{
    /**
     * @param string $account
     * @return ResponseInterface
     */
    public function sendMoney(string $account): ResponseInterface;
}
