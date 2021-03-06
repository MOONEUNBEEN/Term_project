<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use File;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new \App\Article;

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $request)
    {
        /* $rules = [
            'title' => ['required'],
            'content' => ['required', 'min:10'],
        ];

        $messages = [
            'title.required' => '제목은 필수 입력 항목입니다',
            'content.required' => '본문은 필수 입력 항목입니다',
            'content.min' => '본문은 최소 :min 글자 이상이 필요합니다'
        ];

        $this->validate($request, $rules, $messages); */

        /* $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } */

        //$article = \App\User::find(1)->articles()->create($request->all());
        $article = $request->user()->articles()->create($request->all());

        if (! $article) {
            return back()->with('flash_message', '글이 저장되지 않았습니다')->withInput;
        }

        return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //$article = \App\Article::findOrFail($id);

        //return $article->toArray();
        //$id = $request->get('id');
        //$article = Article::where('id',$id->id)->first();
        $article->hits++;
        $article->save();

        $comments = $article->comments()
                            ->with('replies')
                            ->whereNull('parent_id')
                            ->latest()->get();

        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtriclesRequest $request, Article $article)
    {
        $article->update($request->all());
        flash()->success('수정하신 내용을 저장했습니다');

        return redirect(route('articles.show', $article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, ArticlesRequest $request, $id)
    {
        $this->authorize('delete', $article);

        $article = Article::find($id);
        
        $article->delete();

        return response()->json([], 202);

        //return redirect(route('articles.index'));
    }
}
