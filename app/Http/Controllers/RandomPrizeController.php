<?php


namespace App\Http\Controllers;


use App\Http\Requests\Prize\ActionRequest;
use Core\Prize\Prize;
use Core\Prize\PrizeRepository;
use Core\Prize\PrizeService;
use Core\User\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RandomPrizeController
{
    private PrizeRepository $prizeRepository;
    private PrizeService $prizeService;

    public function __construct(PrizeRepository $prizeRepository, PrizeService $prizeService)
    {
        $this->prizeRepository = $prizeRepository;
        $this->prizeService = $prizeService;
    }

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $prizes = $user->prizes;
        return view('home', compact('user', 'prizes'));
    }

    public function getRandomPrize()
    {
        /** @var User $user */
        $user = Auth::user();
        $prize = $this->prizeRepository->getRandomPrize();

        if (null === $prize) {
            return back()->with('error', 'Призы не найдены');
        }

        try {
            $this->prizeService->associateWithUser($prize, $user);
        } catch (\DomainException $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return back()->with('error', $exception->getMessage());
        }

        return back()->with('success', 'Вы получили приз - ' . $prize->name);
    }

    public function actionWithPrize(Prize $prize, ActionRequest $request)
    {
        $action = $request->get('action_type');

        try {
            $this->prizeService->actionWithPrize($prize, $action);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return back()->with('error', $exception->getMessage());
        }

        return back()->with('success', 'Успех!');
    }
}
