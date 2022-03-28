<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Post;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $post = new Post();
            $post->title = $faker->text(20);
            $post->content = $faker->paragraphs(2, true);
            $post->image = $faker->imageUrl(300, 300);
            $post->is_published = 1;
            $post->slug = Str::slug($post->title, '-');
            $post->save();
        }
    }
}
