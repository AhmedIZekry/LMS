<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class);
//         User::factory(10)->create();
//        User::factory()->create([
//
//        ]);
        $user =[
            [
            'name' => 'Ahmed Ibrahim',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ],[
            'name' => 'Ans Ibrahim',
            'email' => 'test1@example.com',
            'password' => Hash::make('password'),
            'role' => 'instructor'
        ]];
        User::insert($user);
    }
}
