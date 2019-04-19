<?php

use Illuminate\Database\Seeder;
use App\Gallery;
use App\User;

class GalleriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function (User $user) {
            $user->galleries()->saveMany(factory(Gallery::class, 15)->make());
        });
    }
}
