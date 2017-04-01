<?php

use Illuminate\Database\Seeder;
use App\Models\FrontUser;

class FrontUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontUser::create([
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('123456')
        ]);

    }
}
