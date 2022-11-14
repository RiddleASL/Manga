<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
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
        // Admin role from role table
        $role_admin = Role::where('name', 'admin')->first();

        // User role from role table
        $role_user = Role::where('name', 'user')->first();

        // Create Admin 
        $admin = new User();
        $admin->name = "Aaron McCormack";
        $admin->email = 'aaron1@gmail.com';
        $admin->password = Hash::make('password');
        $admin->save();

        // Attach Admin roll 
        $admin->roles()->attach($role_admin);

        // Create user 
        $user = new User();
        $user->name = "Adam Parkour";
        $user->email = 'ap123@gmail.com';
        $user->password = Hash::make('password');
        $user->save();
        
        // Attach user roll 
        $user->roles()->attach($role_user);

    }
}
