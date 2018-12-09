<link href="{{URL::to('/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="/ckeditor/ckeditor.js"></script>

<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
        <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" placeholder="Title" class="form-contorl">
        {!! $errors->first('title', '<span class="form-error">:message</span>') !!}
    </div>

    <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
        <textarea name="content" id="content">{{ old('content', $article->content) }}</textarea><br>
        <script type="text/javascript">
            CKEDITOR.replace('content',{
                'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
            });
        </script>
        {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
</div>

<script type="text/javascript">
    CKEDITOR.replace('contents',{
        'filebrowserUploadUrl' : "{{URL::to('/')}}/ckeditor/upload.php"
    });
</script>