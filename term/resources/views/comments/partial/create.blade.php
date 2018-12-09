<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}">

    <div class="media-body">
        <form action="{{ route('articles.comments.store', $article->id) }}" method="post" class="form-horizontal">
            {!! csrf_field() !!}

            @if (isset($parentId))
                <input type="hidden" name="parent_id" value="{{ $parentId }}">
            @endif

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
            </div>

            <button type="submit" class="btn btn-primary btn-sm">전송하기</button>
        </form>
    </div>
</div>