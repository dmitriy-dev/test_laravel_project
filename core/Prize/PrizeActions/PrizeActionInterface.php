<?php


namespace Core\Prize\PrizeActions;


use Core\Prize\Prize;

interface PrizeActionInterface
{
    /**
     * @param Prize $prize
     */
    public function doAction(Prize $prize): void;
}
