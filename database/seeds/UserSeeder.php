<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert(
        ['name' => 'admin','type'=>'0','username' => 'admin','password' => Hash::make('admin')]
      );
    }
}
