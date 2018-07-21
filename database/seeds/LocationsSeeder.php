<?php

use Illuminate\Database\Seeder;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('parking_locations')->insert(
        ['parking_name' => 'Hospital','description'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','number_of_slots'=>'250'],
        ['parking_name' => 'C Gym','description'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','number_of_slots'=>'250'],
        ['parking_name' => 'C Gym','description'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','number_of_slots'=>'250'],
        ['parking_name' => 'Old Gym','description'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','number_of_slots'=>'250'],
        ['parking_name' => 'Patio Minerva','description'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','number_of_slots'=>'250'],
        ['parking_name' => 'Patio Minerva','description'=>'Epifanio delos Santos Avenue(EDSA), Morning Breeze Subdivision, Caloocan, 1400 Metro Manila','number_of_slots'=>'250']
      );
    }
}
