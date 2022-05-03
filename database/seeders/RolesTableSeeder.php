<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'created_at' => '2022-05-01 10:00:00',
                'updated_at' => '2022-05-01 10:00:00',
            ],
            [
                'name' => 'member',
                'created_at' => '2022-05-01 10:00:00',
                'updated_at' => '2022-05-01 10:00:00',
            ],
        ]);
    }
}
