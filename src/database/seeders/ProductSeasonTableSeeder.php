<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'product_id' => '1',
            'season_id' => '3',
        ];
        DB::table('product_seasons')->insert($param);
        
        $param = [
            'id' => 2,
            'product_id' => '1',
            'season_id' => '4',
        ];
        DB::table('product_seasons')->insert($param);
       
        $param = [
            'id' => 3,
            'product_id' => '2',
            'season_id' => '1',
        ];
        DB::table('product_seasons')->insert($param);
        
        $param = [
            'id' => 4,
            'product_id' => '3',
            'season_id' => '4',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 5,
            'product_id' => '4',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
        
        $param = [
            'id' => 6,
            'product_id' => '5',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
        
        $param = [
            'id' => 7,
            'product_id' => '6',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 8,
            'product_id' => '6',
            'season_id' => '3',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 9,
            'product_id' => '7',
            'season_id' => '1',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 10,
            'product_id' => '7',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 11,
            'product_id' => '8',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 12,
            'product_id' => '8',
            'season_id' => '3',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 13,
            'product_id' => '9',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 14,
            'product_id' => '10',
            'season_id' => '1',
        ];
        DB::table('product_seasons')->insert($param);
    
        $param = [
            'id' => 15,
            'product_id' => '10',
            'season_id' => '2',
        ];
        DB::table('product_seasons')->insert($param);
    }
}
