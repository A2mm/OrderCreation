<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
    	$array  = range(1, 3);
    	foreach ($array as $key => $value) {
    		$data = [
    			'name'              => 'Product '. ($key + 1), 
	            'description'       => 'Product '. ($key + 1). ' description is hright here', 
	            'price'             => ($key + 1) * 100,
    		];
    		Product::create($data);
    	}
    }
}
