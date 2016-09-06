<?php

use Illuminate\Database\Seeder;
use App\User;
use Bican\Roles\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => '晚黎',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456')
        ]);

        $user = User::create([
            'name' => '半雅',
            'email' => 'user@user.com',
            'password' => bcrypt('123456')
        ]);

        $adminRole = Role::where('slug', '=', 'admin')->first();
        $userRole = Role::where('slug', '=', 'user')->first();

        $admin->attachRole($adminRole);
        $user->attachRole($userRole);
    }
}
