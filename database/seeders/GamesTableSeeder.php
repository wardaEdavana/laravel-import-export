<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Games;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
            [
                'name' => 'Games',
                'children' => [
                    [    
                        'name' => 'Indoor',
                        'children' => [
                                ['name' => 'Chess'],
                                ['name' => 'Ludo'],
                                ['name' => 'Dominoes'],
                        ],
                    ],
                    [    
                        'name' => 'Outdoor',
                            'children' => [
                                ['name' => 'Cricket'],
                                ['name' => 'Football'],
                                ['name' => 'Rugby'],
                        ],
                    ],
                ],
            ],
        
        ];
        foreach($games as $game)
        {
            Games::create($game);
        }
    }
}
