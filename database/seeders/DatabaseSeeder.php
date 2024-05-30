<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => 'hanoi',
            'phonenumber' => '098818813',
            'password' => Hash::make('1'),
            'role' => 1,
        ];

        // Sử dụng Eloquent để tạo bản ghi
        Account::create($user);
    }
}
