<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserOpdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public $users=array(
        array("name" => "INSPEKTORAT", "username" => "inspektorat", "password_text" => "insp@2022", "password" => "insp@2022")
    );
    public $role = [
        'name' => 'Opd'
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
