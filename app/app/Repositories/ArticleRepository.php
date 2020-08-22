<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    private $Article;

    public function __construct()
    {
        $this->Article = new Article();
    }

    public function find($id)
    {   
        return $this->Article::find($id);
    }
<<<<<<< HEAD
=======

    public function frontRecentlyPagination()
    {
        return $this->Article::paginate(10);
    }
>>>>>>> fuature/Article投稿機能
}