<?php

use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('subscriptions')->insert([
        ['plate_number' => '123 AAA','vehicle_model'=>'Elantra','vehicle_color'=>'Blue','car_type_id'=>'2','start'=>'2018-07-21 23:06:16','end'=>'2019-07-21 23:06:16'],
        ['plate_number' => '123 AAB','vehicle_model'=>'Accent','vehicle_color'=>'Green','car_type_id'=>'2','start'=>'2018-07-21 23:06:16','end'=>'2019-07-21 23:06:16'],
        ['plate_number' => '123 AAC','vehicle_model'=>'Civic','vehicle_color'=>'Gray','car_type_id'=>'2','start'=>'2018-07-21 23:06:16','end'=>'2019-07-21 23:06:16']
      ]);
    }
}
