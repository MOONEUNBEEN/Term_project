<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use \App\Http\Requests\CommentsRequest;
use \App\Article;
use \App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentsRequest $request, Article $article) {
        $comment = $article->comments()->create(array_merge(
            $request->all(),
            ['user_id' => $request->user()->id]
        ));

        flash()->success('작성하신 댓글을 저장했습니다');

        //return $this->respondCreated($article, $comment);
        return redirect(
            route('articles.show', $article->id) . '#comment_' . $comment->id
        );
    }

    public function update(CommentsRequest $request, Comment $comment) {
        $comment->update($request->all());

        return redirect(route('articles.show', $comment->commentable->id).'#comment_'.$comment->id);
    }

    public function destroy(Comment $comment) {
        $comment->delete();

        return response()->json([], 204);
    }
}
