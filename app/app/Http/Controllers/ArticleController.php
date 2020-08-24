<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticlePostRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Genre;
use App\Repositories\GenreRepository;
use App\Repositories\ArticleRepository;
use Auth;

class ArticleController extends Controller
{

    private $genreRepository;

    private $articleRepository;

    public function __construct(
        GenreRepository $genreRepository,
        ArticleRepository $articleRepository
    )
    {
        $this->genreRepository = $genreRepository;
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 編集画面
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $genres = $this->genreRepository->findAll();
        if(!empty($request->id)){
            $Article = $this->articleRepository->find($request->id);
            $title = $Article->title;
            $genre = $Article->genre();
            $tags = $Article->tags;
            if(!empty($tags)){
                $tags_box = [];
                foreach($tags as $tag){
                    array_push($tags_box, $tag->name);
                }
                $tags_value = implode(",", $tags_box);
            }
            $article = $Article->article;
            $article_id = $Article->id;
        }

        return view(
            'admin.article.create',
            [
                'genres' => $genres,
                'title' => $title ?? null,
                'genre' => $genre ?? null,
                'tags' => $tags_value ?? null,
                'article_id' => $article_id ?? null,
                'tags_value' => $tags_value ?? null,
                'article' => $article ?? null,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlePostRequest $request)
    {
        DB::beginTransaction();
        
        // try{
            if(!empty($request->article_id)){
                $Article = $this->articleRepository->find($request->article_id);
            }else{
                $Article = new Article();
            }
            $Article->title = $request->title;
            $Article->article = $request->article;
            $Article->user_id = $request->user()->id;
            $Article->draft = $request->draft;
            $Article->genre_id = $request->genre;
            
            if(!empty($request->tag)){
                $Tag = new Tag();
                $patterns = [];
                $patterns[0] = '/,/';
                $patterns[1] = '/\s/';
                $patterns[2] = '/、/';
                $patterns[3] = '/　/';
                $result = preg_replace($patterns, ",", $request->tag);
                $tags = explode(",", $result);
            }
            
            $Article->save();
            foreach($tags as $tag){
                if(!empty($tag)){
                    $Tag->updateOrCreate(['name' => $tag]);
                    $tag_value = $Tag->where('name', $tag)->first();
                    $Article->tags()->attach($tag_value->id);
                }
            }

        // }catch(\Throwable $t){
        //     DB::rollback();
        //     return back()->withInput();
        // }

        DB::commit();
    
        return redirect(
            route(
                'admin.article.create',
                [
                    'id' => $Article->id,
                ]
            )
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function genre_edit()
    {
        return view(
            'admin.article.genre_edit',
            [
                'genres' => $this->genreRepository->findAll(),
            ]
        );
    }

    public function genre_create(Request $request)
    {   
        DB::beginTransaction();
        $Genre = new Genre();
        $Genre->updateOrCreate(['name' => $request->genre]);
        DB::commit();

        return redirect()->route('admin.article.genre_edit');
    }

    public function genre_patch(Request $request)
    {
        //削除
        DB::BeginTransaction();
        $genre = $request->genre;
        $id = $request->patch_genre_id;
        $Genre = $this->genreRepository->find($id);
        $Genre->name = $genre;
        $Genre->save();
        DB::commit();

        return redirect()->route('admin.article.genre_edit');
    }

    public function genre_delete(Request $request)
    {
        $errors = [];
        $Genre = $this->genreRepository->find($request->delete_genre_id);
        //@todo Genreと紐ずくarticleがある場合削除できない処理
        if(!empty($Genre->articles())){
            $errors['genre_linked_article_message'] = 'ジャンルに紐ずく投稿があるため削除できません。';
            return view(
                'admin.article.genre_edit',
                [
                    'errors' => $errors,
                ]
            );
        }
        $this->genreRepository->delete($Genre);
        
        return redirect()->route('admin.article.genre_edit');
    }

    public function list(Request $request)
    {
        $articles = $this->articleRepository->findUserArticleList($request->id);
        return view(
            'admin.article.list',
            [
                'articles' => $articles,
            ]
        );
    }
}
