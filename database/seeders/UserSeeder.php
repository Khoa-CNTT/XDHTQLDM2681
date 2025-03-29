<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'username'             => "Admin",
                'email'                 => "admin@master.com",
                'password'              => bcrypt("123456"),
                'PhoneNumber'           => "0905807623",
                 'Address'                   => "Quảng nam",
            ]
        ]);
    }
}
