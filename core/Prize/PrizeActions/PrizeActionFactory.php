<?php


namespace Core\Prize\PrizeActions;


use Core\BankIntegration\SomeBankClient;
use Core\UserBalance\UserBalanceService;

class PrizeActionFactory
{
    public static function getAction(string $action): PrizeActionInterface
    {
        if (PrizeActionType::TYPE_CANCEL === $action) {
            return new CancelPrizeAction();
        }
        if (PrizeActionType::TYPE_BANK === $action) {
            return new SendToBankAction(new SomeBankClient());
        }
        if (PrizeActionType::TYPE_BALANCE === $action) {
            return new ConvertToBalanceAction(new UserBalanceService());
        }
        if (PrizeActionType::TYPE_POST === $action) {
            return new PostPrizeAction();
        }
    }
}
