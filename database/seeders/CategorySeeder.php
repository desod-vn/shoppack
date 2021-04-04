<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        DB::table('categories')->insert([
            'name' => 'Quần Áo',
            'slug' => Str::slug('Quần Áo', '-'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Xuân Hoa',
            'slug' => Str::slug('Xuân Hoa', '-'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Lê Xuân Hoa',
            'slug' => Str::slug('Lê Xuân Hoa', '-'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Xuân Bông',
            'slug' => Str::slug('Xuân Bông', '-'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Bông Hoa',
            'slug' => Str::slug('Bông Hoa', '-'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Lê Bông',
            'slug' => Str::slug('Lê Bông', '-'),
        ]);

        DB::table('categories')->insert([
            'name' => 'Lê Hoa',
            'slug' => Str::slug('Lê Hoa', '-'),
        ]);
    }
}
