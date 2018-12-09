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
    <div class="row justify-content-center">
        <h1>Q&A 글쓰기</h1>
        <hr>
        <form action="{{ route('articles.store') }}" method="post">
            {!! csrf_field() !!}

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Title" class="form-contorl">
                {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <textarea name="content" id="content"></textarea><br>
                <script type="text/javascript">
                    CKEDITOR.replace('content',{
                        'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
                    });
                </script>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

<script type="text/javascript">
    CKEDITOR.replace('contents',{
        'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
    });
</script>