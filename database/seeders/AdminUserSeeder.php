<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
Use App\Models\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);
        User::create([
            'name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admineduteku@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user = User::find(1);
        $user->assignRole($role1);
        $normalUser = User::create([
            'name' => 'User',
            'last_name' => 'normal',
            'email' => 'user@test.com',
            'password' => bcrypt('asd123')
        ]);
        $normalUser->assignRole($role2);
        $normalUser2 = User::create([
            'name' => 'User',
            'last_name' => 'normal2',
            'email' => 'user2@test.com',
            'password' => bcrypt('asd123')
        ]);
        $normalUser->assignRole($role2);
    }
}
