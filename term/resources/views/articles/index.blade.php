@extends('layouts.index')
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
<div class="container">
    <div>
        <div class="page-header">
            <h4>Q&A<small> / 글 목록</small></h4>
        </div>
        <div class="text-right">
            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i> 글쓰기
            </a>
        </div>

        <!--정렬 UI-->
        {{-- <div class="btn-group sort__article">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-sort"></i>
                목록 정렬
                <span class="caret"></span>
            </button>

            <ul class="dropdown-menu" role="menu">
                @foreach(config('project.sorting') as $column => $text)
                <li {!! request()->input('sort') == $column ? 'class="active"' : '' !!}>
                    {!! link_for_sort($column, $text) !!}
                </li>
                @endforeach
            </ul>
        </div> --}}

        <article>
            @forelse ($articles as $article)
                @include('articles.partial.article', compact('article'))
            @empty
                <p class="text-center text-danger">글이 없습니다</p>
            @endforelse
        </article>

        @if ($articles->count())
            <div class="text-center">
                {!! $articles->appends(Request::except('page'))->render() !!}
            </div>
        @endif
    </div>
</div>

@include('articles.partial.search')
@endsection