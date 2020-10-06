<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cats  = [
            'Engineering',
            'Matematics',
            'History',
            'Computing'
        ];

        foreach($cats as $cat){
            Category::create([
                'name'=>$cat,
            ]);
        }
    }
}
