<?php


namespace Core\Prize\PrizeActions;


use Core\Prize\Prize;

class PostPrizeAction implements PrizeActionInterface
{
    public function doAction(Prize $prize): void
    {
        // Some code to send prize by post...
        $prize->user_id = null;
        $prize->save();
    }
}
