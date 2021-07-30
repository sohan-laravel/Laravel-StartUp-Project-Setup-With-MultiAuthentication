<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin
        Admin::updateOrCreate([
            'name' => 'Admin',
            'email' => 'zohirulislam1416@gmail.com',
            'password' => Hash::make('1234')
        ]);
    }
}
