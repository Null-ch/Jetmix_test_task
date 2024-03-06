<?php

namespace Database\Seeders;

use App\Models\User;
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
        $email = env('MANAGER_EMAIL');
        User::create([
            'name' => 'Администратор',
            'email' => $email,
            'role' => '0',
            'password' => Hash::make('pehExmJC4WqWDRn9'),
        ]);
    }
}
