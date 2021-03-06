<?php

use App\Article;
use App\Tag;
use Illuminate\Database\Seeder;

class ArticlesTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_articles_tags')->truncate();
        $articles = Article::all();
        $tags = Tag::all()->toArray();
        foreach ($articles as $article) {
            $tagsToAttach = array_unique(array_rand($tags, 3));
            $article->tags()->sync($tagsToAttach);
        }

    }
}
