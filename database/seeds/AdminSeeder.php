<?php

use App\Accountent;
use App\SpecialCompany;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            'password' => Hash::make('123'),
            'username' => 'admin',
            'level' => 1
        ]);
        User::create([
            'password' => Hash::make('123'),
            'username' => 'accountant',
            'level' => 2
        ]);
        Accountent::create([
            'user_id' => 2
        ]);
    }
}
