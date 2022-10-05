<?php

namespace Database\Seeders;

use App\Models\Compain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compain::create([
            'name' => "EightyThree",
            'from' => "2022-05-22",
            'to' => "2022-06-22",
            'total' => 30000,
            'daily_budget' => 1000,
            'images' => [
                "https://www.eighty3.co.uk/wp-content/uploads/2021/10/social-share.jpg",
                "https://pbs.twimg.com/profile_images/1386679833992863745/-2xMsAc9_400x400.jpg",
            ]
        ]);
    }
}
