<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserBankJatimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $users=array(
        array("name" => "BANK JATIM", "username" => "bank_jatim", "password_text" => "bank_jatim@2023", "password" => "bank_jatim@2023")
    );
    public $role = [
        'name' => 'bank-jatim'
    ];

    public function run()
    {
        $role = Role::create($this->role);
        foreach ($this->users as $user) {
            $userx=User::create([
                'name'=>$user['name'],
                'password'=>Hash::make($user['password']),
                'username'=>$user['username'],
                'password_text'=>$user['password'],
            ]);
            $userx->assignRole($role);
        }
    }
}
