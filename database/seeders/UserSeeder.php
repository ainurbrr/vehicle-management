<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'super admin',
            'username' => 'superadmin',
            'password' => Hash::make('superadminpw'),
            'role' => 'superadmin',
            'email' => 'superadmin@example.com',
        ]);

        User::create([
            'name' => 'admin 1',
            'username' => 'admin',
            'password' => Hash::make('adminpw'),
            'role' => 'admin',
            'email' => 'admin@example.com',
        ]);

        User::create([
            'name' => 'approver 1',
            'username' => 'approver1',
            'password' => Hash::make('approver1pw'),
            'role' => 'approver',
            'email' => 'approver@example.com',
        ]);
        User::create([
            'name' => 'approver 2',
            'username' => 'approver2',
            'password' => Hash::make('approver2pw'),
            'role' => 'approver',
            'email' => 'approver2@example.com',
        ]);
    }
}
