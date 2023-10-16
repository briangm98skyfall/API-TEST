<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Brian Gonzalez Manresa',
            'email' => 'briangm@example.com',
            'password' => bcrypt('Code++yml980227')
        ])->assignRole('administrador','editor');

        User::factory(5)->create();
    }
}
