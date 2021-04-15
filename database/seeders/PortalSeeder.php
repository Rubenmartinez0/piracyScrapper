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
            ['name' => 'Imdb.com', 'homeUrl' => 'https://imdb.com/', 'searchUrl' => 'https://imdb.com/find?q='],
            ['name' => 'Playdede.com', 'homeUrl' => 'https://playdede.com/'],
            ['name' => 'Movidy.mobi', 'homeUrl' => 'https://movidy.mobi/', 'searchUrl' => 'https://movidy.mobi/search?query='],
            ['name' => 'Cuevana3.io', 'homeUrl' => 'http://cuevana3.io/'],
            ['name' => 'Eztv.re', 'homeUrl' => 'https://eztv.re/', 'searchUrl' => 'https://eztv.re/search/'],
            ['name' => 'Yts.unblockit.club', 'homeUrl' => 'https://yts.unblockit.club/', 'searchUrl' => 'https://yts.unblockit.club/browse-movies/*query*/all/all/0/latest/0/all'],
        ];

        
        foreach($portals as $portal){
            \App\Models\Portal::create($portal);
        }
    }
}
