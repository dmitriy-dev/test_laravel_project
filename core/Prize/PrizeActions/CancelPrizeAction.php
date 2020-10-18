<?php


namespace Core\Prize\PrizeActions;


use Core\Prize\Prize;

class CancelPrizeAction implements PrizeActionInterface
{
    public function doAction(Prize $prize): void
    {
        $prize->user_id = null;
        $prize->save();
    }
}
