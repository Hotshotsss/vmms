<?php

use Illuminate\Database\Seeder;

class MarkerSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('markers')->insert([


      ['name' => 'Hospital','address'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','lat'=>'14.658697','lng'=>'120.986788','type'=>'parking'],
      ['name' => 'C Gym','address'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','lat'=>'14.660544','lng'=>'120.986351','type'=>'parking'],
      ['name' => 'C Gym','address'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','lat'=>'14.660414','lng'=>'120.985901','type'=>'parking'],
      ['name' => 'Old Gym','address'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','lat'=>'14.657725','lng'=>'120.986221','type'=>'parking'],
      ['name' => 'Patio Minerva','address'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','lat'=>'14.658387','lng'=>'120.985672','type'=>'parking'],
      ['name' => 'Patio Minerva','address'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','lat'=>'14.659304','lng'=>'120.985649','type'=>'parking']
    ]);
  }
}
