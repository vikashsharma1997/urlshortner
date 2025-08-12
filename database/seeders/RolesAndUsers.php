<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Super Admin'],
            ['id' => 2, 'name' => 'Admin'],
            ['id' => 3, 'name' => 'Member'],
        ]);

        $users = [
            ['name' => 'John Super', 'email' => 'super@urlshortner.com', 'roleid' => 1],
            ['name' => 'Alice Admin', 'email' => 'admin@urlshortner.com', 'roleid' => 2],
            ['name' => 'Mike Member', 'email' => 'member@urlshortner.com', 'roleid' => 3],
        ];

        foreach ($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'roleid' => $user['roleid'],
                'password' => Hash::make($user['email']),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
