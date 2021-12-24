<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            trans('messages.Foodanddrinks') ,
            ];
       
            foreach ($services as $service) {
                 Service::create(['name' => $service]);
            }
    }
}
