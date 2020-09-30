<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest; 


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::latest('created_at')
                    ->published()
                    ->paginate(7);
 
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        Article::create($request->all());
        \Session::flash('flash_message', 'Add article successfully.');  // dòng thêm vào 
        
        //cũ : return redirect('articles');
        return redirect()->route('articles.index');

/*        $inputs = \Request::all();
 
        // ② Sử dụng Mass assignment tạo bài viết trong DB
        Article::create($inputs);
 
        // ③ Chuyển hướng đến danh sách bài viết
        return redirect('articles');*/
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
        $article = Article::findOrFail($id);
 
        return view('articles.show', compact('article'));
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
        $article = Article::findOrFail($id);
 
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);
 
        $article->update($request->all());
 
        // cũ : return redirect(url('articles', [$article->id]));
        return redirect()->route('articles.show', [$article->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        \Session::flash('flash_message', 'Deleted article successfully.');  // dòng thêm vào 
        return redirect('articles');
    }
}
