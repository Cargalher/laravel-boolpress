<?php
use App\Post;
use Illuminate\Database\Seeder;
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
        for ($i = 0; $i < 15; $i++) {
            $post = new Post();
            $post->title = $faker-> sentence(3);
            $post->author = $faker-> name();
            $post->post_date = $faker-> dateTimeThisYear();
            $post->post_content = $faker-> text(500);
            $post->image = $faker-> imageUrl(640, 480, 'Posts', true, $post->title);
            $post->published = $faker-> boolean();
            $post->save();
        }
    }
}
