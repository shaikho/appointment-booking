<?php

use App\Limitaion;
use Illuminate\Database\Seeder;

class LimitaionTableSeeder extends Seeder
{
    public function run()
    {
        $limits = [
            [
                'id'         => 1,
                'limitaion'  => 'allowed_days',
                'limit'      => '[]',
                'created_at' => '2019-09-19 12:08:28',
                'updated_at' => '2019-09-19 12:08:28',
            ],
            [
                'id'         => 2,
                'limitaion'  => 'maximum_appointments_per_day',
                'limit'      => '7',
                'created_at' => '2019-09-19 12:08:28',
                'updated_at' => '2019-09-19 12:08:28',
            ],
            [
                'id'         => 3,
                'limitaion'  => 'appointment_duration_per_day',
                'limit'      => '3',
                'created_at' => '2019-09-19 12:08:28',
                'updated_at' => '2019-09-19 12:08:28',
            ],
        ];

        Limitaion::insert($limits);
    }
}
