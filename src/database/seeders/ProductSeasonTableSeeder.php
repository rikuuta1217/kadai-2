<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Season;


class ProductSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('product_seasons')->truncate();
        // 以下のコードでIDの数字をリセット
        DB::table('product_seasons')->truncate();
        // ProductとSeasonのデータを取得
        $product1 = Product::find(1);
        $product2 = Product::find(2);
        $product3 = Product::find(3);
        $product4 = Product::find(4);
        $product5 = Product::find(5);
        $product6 = Product::find(6);
        $product7 = Product::find(7);
        $product8 = Product::find(8);
        $product9 = Product::find(9);
        $product10 = Product::find(10);

        $spring = Season::where('name', '春')->first();
        $summer = Season::where('name', '夏')->first();
        $autumn = Season::where('name', '秋')->first();
        $winter = Season::where('name', '冬')->first();

        // product_seasonsテーブルにデータを挿入
        if ($spring && $product1) {
            $product1->seasons()->attach($autumn->id);
        }
        if ($summer && $product1) {
            $product1->seasons()->attach($winter->id);
        }
        if ($autumn && $product2) {
            $product2->seasons()->attach($spring->id);
        }
        if ($winter && $product3) {
            $product3->seasons()->attach($winter->id);
        }
        if ($summer && $product4) {
            $product4->seasons()->attach($summer->id);
        }
        if ($summer && $product5) {
            $product5->seasons()->attach($summer->id);
        }
        if ($summer && $product6) {
            $product6->seasons()->attach($summer->id);
        }
        if ($autumn && $product6) {
            $product6->seasons()->attach($autumn->id);
        }
        if ($spring && $product7) {
            $product7->seasons()->attach($spring->id);
        }
        if ($summer && $product7) {
            $product7->seasons()->attach($summer->id);
        }
        if ($summer && $product8) {
            $product8->seasons()->attach($summer->id);
        }
        if ($autumn && $product8) {
            $product8->seasons()->attach($autumn->id);
        }
        if ($summer && $product9) {
            $product9->seasons()->attach($summer->id);
        }
        if ($spring && $product10) {
            $product10->seasons()->attach($spring->id);
        }
        if ($summer && $product10) {
            $product10->seasons()->attach($summer->id);
        }

        $this->command->info("✅ product_seasons テーブルにデータが追加されました！");
    }
    // public function run()
    // {
    //     $param = [
    //         'id' => 1,
    //         'product_id' => '1',
    //         'season_id' => '3',
    //     ];
    //     DB::table('product_seasons')->insert($param);
        
    //     $param = [
    //         'id' => 2,
    //         'product_id' => '1',
    //         'season_id' => '4',
    //     ];
    //     DB::table('product_seasons')->insert($param);
       
    //     $param = [
    //         'id' => 3,
    //         'product_id' => '2',
    //         'season_id' => '1',
    //     ];
    //     DB::table('product_seasons')->insert($param);
        
    //     $param = [
    //         'id' => 4,
    //         'product_id' => '3',
    //         'season_id' => '4',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 5,
    //         'product_id' => '4',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
        
    //     $param = [
    //         'id' => 6,
    //         'product_id' => '5',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
        
    //     $param = [
    //         'id' => 7,
    //         'product_id' => '6',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 8,
    //         'product_id' => '6',
    //         'season_id' => '3',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 9,
    //         'product_id' => '7',
    //         'season_id' => '1',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 10,
    //         'product_id' => '7',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 11,
    //         'product_id' => '8',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 12,
    //         'product_id' => '8',
    //         'season_id' => '3',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 13,
    //         'product_id' => '9',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 14,
    //         'product_id' => '10',
    //         'season_id' => '1',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    
    //     $param = [
    //         'id' => 15,
    //         'product_id' => '10',
    //         'season_id' => '2',
    //     ];
    //     DB::table('product_seasons')->insert($param);
    // }
}
