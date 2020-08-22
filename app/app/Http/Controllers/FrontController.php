<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Repositories\GenreRepository;
use App\Repositories\ArticleRepository;

class FrontController extends Controller
{
    private $genreRepository;
    private $articleRepository;

    public function __construct(
        GenreRepository $genreRepository,
        ArticleRepository $articleRepository
    ){
        $this->genreRepository = $genreRepository;
        $this->articleRepository = $articleRepository;
    }

    public function index(Request $request)
    {
        $recently_article = $this->articleRepository->frontRecentlyPagination();

        return view(
            'front.index',
            [
                'recently_article' => $recently_article,
            ]
        );
    }
}
