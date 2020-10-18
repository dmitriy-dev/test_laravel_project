<?php


namespace Core\Prize\PrizeActions;


use Core\Prize\PrizeType;

class PrizeActionType
{
    public const TYPE_CANCEL = 'cancel';
    public const TYPE_BANK = 'bank';
    public const TYPE_BALANCE = 'balance';
    public const TYPE_POST = 'post';

    public const NAMES = [
        self::TYPE_CANCEL => 'Отказаться от приза',
        self::TYPE_BANK => 'Отправить на счет в банке',
        self::TYPE_BALANCE => 'Зачислить на баланс',
        self::TYPE_POST => 'Отправка по почте',
    ];

    public const ALLOWED_ACTIONS = [
        PrizeType::TYPE_SUBJECT => [
            self::TYPE_POST,
            self::TYPE_CANCEL,
        ],
        PrizeType::TYPE_BONUS => [
            self::TYPE_BALANCE,
            self::TYPE_CANCEL,
        ],
        PrizeType::TYPE_MONEY => [
            self::TYPE_BANK,
            self::TYPE_BALANCE,
            self::TYPE_CANCEL,
        ],
    ];
}
