<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
	
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [[

            'name' => Str::random(10),
            'parent_id' => 0
            
            ],
           
            [
            'name' => Str::random(10),
            'parent_id' => 1
            
            ],
            [
            'name' => Str::random(10),
            'parent_id' => 1
            
            ],
            [
            'name' => Str::random(10),
            'parent_id' => 3
            
            ],

            [
            'name' => Str::random(10),
            'parent_id' => 4
            
            
            ],
             [
            'name' => Str::random(10),
            'parent_id' => 5
            
            
            ],
             [
            'name' => Str::random(10),
            'parent_id' => 6
            
            
            ]
        ];

        foreach($categories as $cat){
             DB::table('categories')->insert($cat);
        }
       
    }
}
        	
    

