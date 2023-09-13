<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);\

        $this->call([
            // KPMBLTSeeder::class,
            // UserSeeder::class,
            // RoleSeeder::class,
            // // SurveyorSeeder::class,
            // JenisKebetuhanSeeder::class,
            // KecamatanSeeder::class,
            // KelurahanSeeder::class,
            // KuotaKelurahanSeeder::class,
            // ExistingPengajuanSeeder::class
            // UserKelurahanSeeder::class,
            // UserOpdSeeder::class,
        ]);
    }
}
