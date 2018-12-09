@extends('layouts.index')
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
<link href="{{URL::to('/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/ckeditor/ckeditor.js"></script>
@section('content1')
<div class="container">
        <div class="page-header">
            <h4>Q&A<small> / 글수정 {{ $article->title }}</small></h4>
        </div>

        <form action="{{ route('articles.update', $article->id) }}" method="post">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            @include('articles.partial.form')

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
</div>
@endsection

<script type="text/javascript">
    CKEDITOR.replace('contents',{
        'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
    });
</script>