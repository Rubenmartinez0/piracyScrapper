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
            ['name' => 'Imdb.com', 'homeUrl' => 'https://imdb.com/', 'searchUrl' => 'https://imdb.com/find?q=', 'spaceSubstitute' => '+'],
            ['name' => 'Playdede.com', 'homeUrl' => 'https://playdede.com/'],
            ['name' => 'Movidy.mobi', 'homeUrl' => 'https://movidy.mobi/', 'searchUrl' => 'https://movidy.mobi/search?query=', 'spaceSubstitute' => '%20'],
            ['name' => 'Cuevana3.io', 'homeUrl' => 'http://cuevana3.io/'],
            ['name' => 'Eztv.re', 'homeUrl' => 'https://eztv.re/', 'searchUrl' => 'https://eztv.re/search/', 'spaceSubstitute' => '-'],
            ['name' => 'Yts.unblockit.club', 'homeUrl' => 'https://yts.unblockit.club/', 'searchUrl' => 'https://yts.unblockit.club/browse-movies/', 'spaceSubstitute' => '%20'],
        ];

        foreach($portals as $portal){
            \App\Models\Portal::create($portal);
        }
    }
}
