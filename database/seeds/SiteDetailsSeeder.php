<?php

use Illuminate\Database\Seeder;

class SiteDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SiteDetails::create([
            'site_name'=>'KoreanShop',
            'address'=>'ishurdi',
            'about'=>'Korean Shop Bangladesh is all set to bring 100% authentic and the best of Korean Skincare products for Bangladeshi People at a reasonable price.',
            'logo'=>'public/media/sitelogo/koreanshopbd.png',
            'phone_1'=>'01794790598',
            'email'=>'Koreanshopbangladesh@gmail.com',
            'facebook_link'=>'Koreanshopbangladesh@gmail.com',
            'google_link'=>'Koreanshopbangladesh@gmail.com',
            'instagram_link'=>'Koreanshopbangladesh@gmail.com',
        ]);
    }
}
