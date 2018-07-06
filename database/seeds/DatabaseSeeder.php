<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $user = ['name' => 'admin','type'=>'0','username' => 'admin','password' => Hash::make('admin')];
		    $db = DB::table('users')->insert($user);
    }
}
