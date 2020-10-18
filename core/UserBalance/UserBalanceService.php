<?php


namespace Core\UserBalance;


use Core\User\User;

class UserBalanceService
{
    /**
     * @param User $user
     * @param float $amount
     * @param string $description
     */
    public function appendBalance(User $user, float $amount, string $description): void
    {
        if (null === $user->balance) {
            $user->balance()->create([]);
            $user->refresh();
        }

        $user->balance->appendRow($amount, $description);
    }
}
