<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PortalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portals = [
            ['name' => 'Playdede.com', 'homeUrl' => 'https://playdede.com/'],
            ['name' => 'Movidy.mobi', 'homeUrl' => 'https://movidy.mobi/', 'searchUrl' => 'https://movidy.mobi/search?query='],
            ['name' => 'Cuevana3.io', 'homeUrl' => 'http://cuevana3.io/'],
        ];
        foreach($portals as $portal){
            \App\Models\Portal::create($portal);
        }
    }
}
