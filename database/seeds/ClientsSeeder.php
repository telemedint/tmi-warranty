<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::insert([
            [
                'name' => 'Dr. Baher Baher',
                'company' => 'Nile Hospital',
                'email' => 'baher@nile.com',
                'phone' => '01111111111',
                'address' => 'Maady - Giza - Egypt',
            ],

            [
                'name' => 'Dr. Walid Walid',
                'company' => 'Al-Kasr Al-Ainy Hospital',
                'email' => 'walid@al-kasr.com',
                'phone' => '02222222222',
                'address' => 'Al_Manyal - Giza - Egypt',
            ],

            [
                'name' => 'Dr. Sameh Sameh',
                'company' => 'Ain Shams Hospitals',
                'email' => 'sameh@ain-shams.com',
                'phone' => '03333333333',
                'address' => 'Al_Abbasia - Giza - Egypt',
            ],
            
        ]);
    }
}
