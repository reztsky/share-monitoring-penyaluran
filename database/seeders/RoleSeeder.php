<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=[
            'name'=>'Admin Pelayanan'
        ];

        $role=Role::create($role);
        $user=User::create([
            'name'=>'Admin Pelayanan',
            'username'=>'pelayanan',
            'password'=>Hash::make('pelayanan123'),
            'password_text'=>'pelayanan123',
        ]);
        $user->assignRole('Admin Pelayanan');
        

    }
}
