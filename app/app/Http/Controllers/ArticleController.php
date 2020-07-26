<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'admin.article.create',
            []
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = [];

        if($request->title === null){
            $errors['title'] = 'タイトルが入力されていません。';
        }
        if($request->article === null){
            $errors['article'] = '記事が入力されていません。';
        }

        if(!empty($errors)){
            return view(
                'main.article.index',
                [
                    'errors' => $errors,
                ]
            );
        }

        DB::beginTransaction();
        
        try{
            $Article = new Article();
            $Article->title = $request->title;
            $Article->article = $request->article;
            $Article->user_id = $request->user()->id;
            if(!empty($request->genre)){
                $Genre = new Genre();
                $Genre->updateOrCreate(['name' => $request->genre]);
                $genre_value = $Genre->where('name', $request->genre)->first();
            }
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
                
            if(!empty($genre_value)){
                $Article->genres()->attach($genre_value->id);
            }

        }catch(\Throwable $t){
            DB::rollback();
            return back()->withInput();
        }

        DB::commit();
    
        return redirect(
            route(
                'article.edit',
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
}
