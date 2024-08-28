<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'pseudo_user' => 'admin',
                'role_id' => '2',
                'email' => 'admin@example.com',
                'password' => Hash::make('azertyuiop'),
                'email_verified_at' => now(),
            ],
            [
                'pseudo_user' => 'user',
                'role_id' => '1',
                'email' => 'user@example.com',
                'password' => Hash::make('azertyuiop'),
                'email_verified_at' => now(),
            ],
        ]);
        User::factory(1)->create();
    }
}
