<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\GenreRepository;

class FrontController extends Controller
{
    private $articleRepository;

    private $genreRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        GenreRepository $genreRepository
    ){
        $this->articleRepository = $articleRepository;
        $this->genreRepository = $genreRepository;
    }

    public function index(Request $request)
    {
        $recently_articles = $this->articleRepository->frontRecentlyPagination();

        return view(
            'front.index',
            [
                'recently_articles' => $recently_articles,
            ]
        );
    }

    public function show(Request $request)
    {
        $article = $this->articleRepository->find($request->id);
        $a = $article->genre();
        return view(
            'front.show',
            [
                'article' => $article,
            ]
        );
    }
}
