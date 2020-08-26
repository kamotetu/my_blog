<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\User;

class ArticleRepository
{
    private $Article;

    private $User;

    public function __construct()
    {
        $this->Article = new Article();
        $this->User = new User();
    }

    public function find($id)
    {   
        return $this->Article::find($id);
    }

    public function frontRecentlyPagination()
    {
        return $this->Article::paginate(10);
    }

    public function findUserArticleList($id)
    {
        return $this->User::find($id)->articles;
    }
}