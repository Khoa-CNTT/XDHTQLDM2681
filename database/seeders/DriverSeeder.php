<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->delete();
        DB::table('drivers')->truncate();

        DB::table('drivers')->insert([
            [
                'username'      => "Long",
                'fullname'      => "Nguyễn Thành Long",
                'email'         => "longkolp16@gmail.com",
                'password'      => bcrypt("123456"),  // Băm mật khẩu
                'phonenumber'   => "0905807623",
                'address'       => "Đà Nẵng",
                'avatar'        => null,  // Nếu không có ảnh
                'dateofbirth'   => "1995-08-16",
                'vehicle_type'  => "Xe máy",
                'license_plate' => "43A1-12345",
                'id_card'       => "123456789",
                'status'        => "chờ duyệt", // Trạng thái mặc định
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
