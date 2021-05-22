<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
        	[
                'name'=>'Mito',
                'price' => '280',
                'description' => 'Jam tangan Android',
                'category' => 'mobile',
                'gallery' => 'https://d2pa5gi5n2e1an.cloudfront.net/global/images/product/mobilephones/Mito_S500/Mito_S500_L_1.jpg'  
            ],
            [
                'name'=>'Redmi',
                'price' => '290',
                'description' => 'Jam tangan Android Dari Xiaomi',
                'category' => 'mobile',
                'gallery' => 'https://p.ipricegroup.com/uploaded_3f9a26730c60e45da15947234713ad06.jpg'  
            ],
            [
                'name'=>'Apple Smart Watch',
                'price' => '500',
                'description' => 'Jam tangan Android dari Apple',
                'category' => 'mobile',
                'gallery' => 'https://cf.shopee.co.id/file/05a7a56b92147181093c591203f07232'  
            ],
        ]);
    }
}
