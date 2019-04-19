<?php

use App\Gallery;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Gallery::class, function (Faker $faker) {

    $nature = [
        'https://images.pexels.com/photos/443446/pexels-photo-443446.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://i.ytimg.com/vi/L2WgJgAULo8/maxresdefault.jpg',
        'https://i.imgur.com/QztlVTN.jpg',
        'https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80',
        'http://thewowstyle.com/wp-content/uploads/2015/07/natural-wallpaper-for-desktop.jpeg',
        'http://7-themes.com/data_images/collection/5/4468614-wallpaper-hd-nature.jpg',
        'https://stmed.net/sites/default/files/nature-wallpapers-27745-4786184.jpg',
        'https://3.bp.blogspot.com/-RRePaaknVAM/TZwLDWIxXyI/AAAAAAAABNI/AQgYnL2x3NM/s1600/Nice+wallpapers+061126_ancient_india_city-1024x768.jpg',
    ];

    $city = [
        'https://wallpaperplay.com/walls/full/8/5/0/171846.jpg',
        'https://images8.alphacoders.com/938/938851.jpg',
        'http://paperlief.com/images/canada-city-wallpaper-wallpaper-3.jpg',
        'https://wallpaperaccess.com/full/895.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlVcZSxCHbGZ7WRailIx27pt-MYwDKRQI6N0zD0ggLM0MvbAMg',
        'http://tecnologia.mediatelecom.com.mx/wp-content/uploads/2018/05/Roads-for-the-Future.jpg',
        'https://i.pinimg.com/originals/63/b7/16/63b716f21162cc878ca8fca8c91e4022.jpg',
        'https://i.imgur.com/0y1jhNx.jpg',
        'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR54n7xXQ7HDhKcgZQQLr2MGx1Pz0eyYIrRBBE-_rpRW3f5-CdTKg'
    ];

    $animals = [
        'https://hd-wallpapersfd.info/wp-content/uploads/HTML/Wallpaper-animals/Wallpaper-animals71.jpg',
        'https://s-media-cache-ak0.pinimg.com/originals/ce/20/19/ce20190f496666cb6fbdbc94653984fd.jpg',
        'https://cdn.guidingtech.com/media/assets/Cute-animal-wallpapers-thumbnail.jpg',
        'http://2.bp.blogspot.com/-RPXwCJtHp3g/TlabBLfpJGI/AAAAAAAAYio/uG8-_NPX2s0/s1600/animal+wallpapers-1.jpg',
        'https://wallpaperplay.com/walls/full/1/9/1/78206.jpg',
        'https://www.pixelstalk.net/wp-content/uploads/2016/10/Animal-World-Wallpaper-Free-Download.jpg',
        'http://sf.co.ua/13/06/wallpaper-2874133.jpg',
        'https://thewallpaper.co/wp-content/uploads/2017/07/leopardswild-life-amazing-freeanimals-national-mobile-wallpapers-desktop-images-4k-animal-images-geographic_1600x1200.jpg',
        'https://wallup.net/wp-content/uploads/2018/10/09/295147-animals-national-geographic.jpg',
        'https://wallpapercave.com/wp/d0qCOAx.jpg',
        'http://inn.spb.ru/images/400/DSC100498121.jpg'
    ];

    $galleries = [$nature, $city, $animals];
    $randomGallery = \Arr::random($galleries);
    $randomUrls =  \Arr::random($randomGallery, 3);

    return [
        'name' =>  $faker->word,
        'description' =>  $faker->sentence,
        'pictures_urls'=> $randomUrls
    ];
});
