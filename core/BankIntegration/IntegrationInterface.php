<?php


namespace Core\BankIntegration;

use Core\User\User;

/**
 * Interface IntegrationInterface
 * @package Core\BankIntegration
 */
interface IntegrationInterface
{
    /**
     * @param User $user
     * @return ResponseStructure
     */
    public function sendMoney(User $user): ResponseStructure;
}
