@extends('layouts.index')
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
<link href="{{URL::to('/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/ckeditor/ckeditor.js"></script>
{{-- <script>
        function delReq(id) {
            var yn = confirm("Are you sure?");
            
            if (yn == false) return;

            $('#btnDelete').submit();	
        }
</script> --}}
@section('content1')
<div class="container">
    <div>
        <div class="page-header">
            <h4>Q&A<small> / {{ $article->title }}</small></h4>
        </div>

        <article>
            @include('articles.partial.article', compact('article'))

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <textarea name="content" id="content">{{ $article->content }}</textarea><br>
                    <script type="text/javascript">
                        CKEDITOR.replace('content',{
                            'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
                        });
                    </script>
            </div>
        </article>

        <div class="text-center action__article">
            @can('update', $article)
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil"></i> 글수정
                </a>
            @endcan
            @can('delete', $article)
                <button class="btn btn-danger button__delete">
                    <i class="fa fa-trash-o"></i> 글삭제
                </button>
                {{-- <form action="{{route('articles.destroy', $article->id)}}" id="delete" method="post">	
						@csrf
						@method('DELETE')
                        <input type="hidden" id="id" name="id" value={{ $article["id"] }}>
                        <input type="submit" id="btnDelete" class="btn btn-danger" 
							 onclick="delReq({{$article["id"]}})" value="삭제">
						<input type="button" id="btnDelete" class="btn btn-danger" 
							  value="삭제">

					</form> --}}
            @endcan
            <a href="{{ route('articles.index') }}" class="btn btn-default">
                <i class="fa fa-list"></i> 글목록
            </a>
        </div>

        <div class="container__comment">
            @include('comments.index')
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
            $('.button__delete').on('click', function (e) {
              var articleId = $('article').data('id');
              if (confirm('글을 삭제합니다')) {
                $.ajax({
                  type: 'DELETE',
                  url: '/articles/' + articleId
                }).then(function () {
                  window.location.href = '/articles';
                });
              }
            });
    </script>
    {{-- <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnDelete').on('click', function(){
                if(confirm('글을 삭제합니다.')) {
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route("articles.destroy", ["article"=>$article->id]) }}',
                        success: function(data) {
                            if(data == 'true') {
                                location.href="{{ route('articles.index') }}";
                            }
                        },
                    });
                }	
            });
        </script> --}}
@endsection

<script type="text/javascript">
    CKEDITOR.replace('contents',{
        'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
    });
</script>