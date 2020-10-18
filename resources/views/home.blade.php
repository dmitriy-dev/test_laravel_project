<?php
/**
 * @var \Core\Prize\Prize[] $prizes
 * @var \Core\User\User $user
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3>Ваш баланс: {{ null !== $user->balance ? $user->balance->amount() : 'Пуст' }}</h3>
                            <h2>Ваши текущие призы:</h2>
                            @if($prizes->isEmpty())
                                Призов еще нет
                            @else
                                @foreach($prizes as $prize)
                                    <div class="card">
                                        <div class="card-body">
                                            <p>
                                                <strong>{{ $prize->name }} {{ (float)$prize->value > 0 ? '(' . (float)$prize->value . ')' : null }}</strong>
                                            </p>
                                            <p>
                                                Действия с призом
                                            </p>
                                            <form method="POST" action="{{ route('prizeAction', ['prize' => $prize->id]) }}">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Example select</label>
                                                    <select class="form-control" name="action_type">
                                                        @foreach(Core\Prize\PrizeActions\PrizeActionType::ALLOWED_ACTIONS[$prize->type] as $allowedAction)
                                                            <option value="{{ $allowedAction }}">{{ Core\Prize\PrizeActions\PrizeActionType::NAMES[$allowedAction] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Отправить</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <hr class="mt-5"/>
                            <p>
                                <a class="btn btn-success" href="{{ route('getRandomPrize') }}">Получить случайный
                                    приз</a>
                            </p>
                            @if(session('error'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
