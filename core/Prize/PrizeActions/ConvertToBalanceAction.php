<?php


namespace Core\Prize\PrizeActions;


use Core\Prize\Prize;
use Core\UserBalance\UserBalanceService;
use Illuminate\Support\Facades\DB;

class ConvertToBalanceAction implements PrizeActionInterface
{
    private UserBalanceService $userBalanceService;

    public function __construct(UserBalanceService  $userBalanceService)
    {
        $this->userBalanceService = $userBalanceService;
    }

    public function doAction(Prize $prize): void
    {
        DB::transaction(function () use ($prize) {
            $this->userBalanceService->appendBalance($prize->user, (float)$prize->value, 'Перевод приза на баланс');
            $prize->user_id = null;
            $prize->save();
        });
    }
}
