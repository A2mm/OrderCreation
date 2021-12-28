<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::truncate();

    	$emails_array  = ['freeEmail@example.com', 'premiumEmail@example.com'];
    	$types_array   = ['free', 'premium'];

    	foreach ($emails_array as $key => $value) {
    		$data = [
    			'name'              => $types_array[$key]. ' User',
	            'username'          => $types_array[$key] .' User',
	            'email'             => $value,
	            'email_verified_at' => now(),
	            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
	            'remember_token'    => Str::random(10),
	            'account_type'      => $types_array[$key],
    		];
    		User::create($data);
    	}
        // User::factory()->count(2)->create();
    }
}
