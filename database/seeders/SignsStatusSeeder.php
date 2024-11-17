<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SignsStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('signs_status')->insert([
            [
                'id' => 1,
                'status_name' => 'Черновик',
                'status_code' => 'new',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 2,
                'status_name' => 'Подписан 1-й подписью',
                'status_code' => 'sign1',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 3,
                'status_name' => 'Подписан 2-й подписью',
                'status_code' => 'sign2',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 4,
                'status_name' => 'Доставляется',
                'status_code' => 'delivering',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 5,
                'status_name' => 'Доставлен',
                'status_code' => 'delivered',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 6,
                'status_name' => 'Отклонен',
                'status_code' => 'rejected',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 7,
                'status_name' => 'Просрочен',
                'status_code' => 'outdated',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 8,
                'status_name' => 'Не доставлен',
                'status_code' => 'not_delivered',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 9,
                'status_name' => 'Ошибка подписания 2й подписью',
                'status_code' => 'sign2_error',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
            [
                'id' => 10,
                'status_name' => 'Удален',
                'status_code' => 'deleted',
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],
        ]);

    }
}
