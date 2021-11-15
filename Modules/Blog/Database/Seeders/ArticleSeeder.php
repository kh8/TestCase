<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $articles = [
            [
                'title' => 'The Default Route Files',
                'content' => 'Content',
                'user_id' => 1,
            ],
            [
                'title' => 'Article number 7261321',
                'content' => 'Content of article',
                'user_id' => 1,
            ],
        ];
        foreach ($articles as $article) {
            DB::table('articles')->insert([
                'user_id' => $article['user_id'],
                'title' => $article['title'],
                'content' => $article['content'],
            ]);
        }
    }
}
