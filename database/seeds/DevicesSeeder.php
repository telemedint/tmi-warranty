<?php

use App\Device;
use Illuminate\Database\Seeder;

class DevicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::insert([
            'name' => 'Telescope gray 500',
            'full_serial' => '1-213-500',
            'serial_second' => '213',
            'serial_first' => '500',
            'image' => 'telescope.jpg',
            'category_id' => '1',
        ]);
    }
}
