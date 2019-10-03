<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            'article_title'=>str_random(8),
            'article_content'=>str_random(20),
            'user_id'=>1,
            'magazine_id'=>0,
            'category_id'=>1,
            'article_cover'=>'main_logo.jpeg',
            'views'=>10,
            'is_active'=>1,
            'created_at'=>date('Y-m-d')
        ]);
    }
}
