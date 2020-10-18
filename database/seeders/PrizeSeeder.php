<?php

namespace Database\Seeders;

use Core\Prize\Prize;
use Core\Prize\PrizeType;
use Illuminate\Database\Seeder;

class PrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prize::insert([
            [
                'name' => 'Денежный приз',
                'value' => '10000',
                'type' => PrizeType::TYPE_MONEY,
                'created_at' => now(),
            ],
            [
                'name' => 'Бонусный приз',
                'value' => '5400',
                'type' => PrizeType::TYPE_BONUS,
                'created_at' => now(),
            ],
            [
                'name' => 'Предметный приз',
                'value' => null,
                'type' => PrizeType::TYPE_SUBJECT,
                'created_at' => now(),
            ],
        ]);
    }
}
