<?php

use Illuminate\Database\Seeder;

class PurposeSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('purpose')->insert(
      ['purpose' => 'Hospital'],
      ['purpose' => 'Drop-By'],
      ['purpose' => 'Delivery']
    );
  }
}
