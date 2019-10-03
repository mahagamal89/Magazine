<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('channels')->insert([
            'channel_name'=>'ثبات',
            'cover_path'=>'main_logo.jpeg',
            'is_active'=>1            
        ]);
    }
}
