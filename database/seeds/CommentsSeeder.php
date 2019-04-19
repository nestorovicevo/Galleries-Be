<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\User;
use App\Gallery;

class CommentsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $galleries = Gallery::all();

        User::all()->each(function (User $user) use ($galleries) {
            $galleries->each(function (Gallery $gallery) use ($user){
                factory(Comment::class)->create([
                    'creator_id' => $user->id,
                    'gallery_id' => $gallery->id
                ]);
            });
        });
    }
}
