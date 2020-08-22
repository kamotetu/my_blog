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

    public function frontRecentlyPagination()
    {
        return $this->Article::paginate(10);
    }
}