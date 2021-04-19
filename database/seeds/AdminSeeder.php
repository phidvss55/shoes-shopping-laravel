<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name' => 'Super Admin',
            'email' => 'phi@gmail.com',
            'password' => bcrypt('123'),
            'phone' => '0333082121',
            'address' => 'Di An, Binh Duong',
            'created_at' => \Carbon\Carbon::now()
        ]);
        Admin::insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'phone' => '0987654321',
            'address' => 'Di An, Binh Duong',
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
