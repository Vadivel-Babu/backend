<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['vel', 'mani'];
        $emails = ['vel@mail.com', 'mani@mail.com'];
        $imgs = ['https://media.springernature.com/lw703/springer-static/image/art%3A10.1038%2F528452a/MediaObjects/41586_2015_Article_BF528452a_Figg_HTML.jpg', 'https://uploads.sitepoint.com/wp-content/uploads/2016/03/1458289957powerful-images3.jpg'];

        foreach ($names as $index => $name) {
            DB::table('employees')->insert([
                'name' => $name,
                'email' => $emails[$index],
                'img' => $imgs[$index],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
