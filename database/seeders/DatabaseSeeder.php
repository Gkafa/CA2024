<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create()->each(function (User $user) {
            $user->posts()->saveMany(
                Post::factory(rand(5, 10))->make()->each(function ($post) use ($user) {
                    $post->user_id = $user->id;
                    $post->save();

                    $post->comments()->saveMany(
                        Comment::factory(rand(1, 5))->create([
                            'post_id' => $post->id,
                            'name' => fake()->name(),
                        ])
                    );
                })
            );
        });

    }
}
