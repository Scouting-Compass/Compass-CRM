<?php

use Illuminate\Database\Seeder;
use ActivismeBe\Models\{City, Province};
use League\Csv\{Reader, Statement};

/**
 * Class CityTableSeeder
 */
class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  City      $cities    The resource model for the belgian cities
     * @param  Province  $provinces The resource model for the belgian provinces
     * @param  Statement $stmt      The Class instance for the statement against the CSV source file. 
     * @return void
     */
    public function run(City $cities, Province $provinces, Statement $stmt): void
    {
        $csv = Reader::createFromPath(database_path('seeds/sources/belgian-cities.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($stmt->process($csv) as $city) {
            // Create a new province if not exists
            $province = $provinces->firstOrCreate(['name' => $city['province']]);

            // Create a new city in the database if not exists
            $cityInformation = $cities->firstOrCreate([
                // City information
                'province_id' => $province->id, 'postal' => $city['postal'], 'name' => $city['name'], 'lat' => $city['lat'], 'lng' => $city['lng']
            ])->setStatus('pending');;

            // Attach province to the create city 
            $cityInformation->province()->associate($province)->save();
        }
    }
}
