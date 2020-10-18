<?php


namespace Core\Prize;


use Core\Prize\PrizeActions\PrizeActionFactory;
use Core\User\User;

class PrizeService
{
    /**
     * @param Prize $prize
     * @param User $user
     */
    public function associateWithUser(Prize $prize, User $user): void
    {
        $prize->user()->associate($user);

        try {
            $prize->saveOrFail();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error associating prize with user', $exception->getCode(), $exception);
        }
    }

    /**
     * @param Prize $prize
     * @param string $action
     */
    public function actionWithPrize(Prize $prize, string $action): void
    {
        $prizeAction = PrizeActionFactory::getAction($action);
        $prizeAction->doAction($prize);
    }
}
