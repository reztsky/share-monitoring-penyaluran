<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Ivan Bagas Pratama',
            'username'=>'ivanpra',
            'password'=>Hash::make('ivan00'),
            'password_text'=>'ivan00',
        ]);
    }
}
