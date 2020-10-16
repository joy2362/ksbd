<?php

use Illuminate\Database\Seeder;
use  App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        'name'=>'abdullah zahid',
        'phone'=>'01780134797',
        'email'=>'abdullahzahidjoy@gmail.com',
        'password'=>Hash::make('2362'),
    ]);
    }
}
