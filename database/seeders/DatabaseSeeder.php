<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::factory(10)->create()->each(function (User $user) {
//            $user->posts()->saveMany(
//                Post::factory(rand(5, 10))->make()->each(function ($post) use ($user) {
//                    $post->comments()->saveMany(
//                        Comment::factory(rand(1,5))->create([
//                            'post_id' => $post,
//                            'user_id' => $user,
//                        ])
//                    );
//                })
//            );
//        });
        User::factory(10)->create()->each(function (User $user) {
            $user->posts()->saveMany(
                Post::factory(rand(5, 10))->make()->each(function ($post) use ($user) {
                    // Save the post and assign the user_id
                    $post->user_id = $user->id;
                    $post->save();

                    // Create and assign comments to the post and user
                    $post->comments()->saveMany(
                        Comment::factory(rand(1, 5))->create([
                            'post_id' => $post->id,  // Associate comment with post
                        ])
                    );
                })
            );
        });

    }
}
