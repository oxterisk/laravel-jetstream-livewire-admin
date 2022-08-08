<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( ['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('12345678'), 'is_admin' => 1] );
    }
}
