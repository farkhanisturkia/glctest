<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('password'),
            'role'      => 'admin'
        ]);

        User::create([
            'nip'       => '32122122',
            'password'  => Hash::make('password')
        ]);

        Paket::create([
            'name'      => 'Home 1',
            'price'     => '100000'
        ]);

        Paket::create([
            'name'      => 'Home 2',
            'price'     => '150000'
        ]);

        Paket::create([
            'name'      => 'Home 3',
            'price'     => '200000'
        ]);
    }
}
