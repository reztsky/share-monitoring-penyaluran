<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        $users=User::all();
        $role=Role::create($role);

        foreach ($users as $user) {
            $user->assignRole('Admin Pelayanan');
        }

    }
}
