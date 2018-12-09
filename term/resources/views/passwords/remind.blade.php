@extends('layouts.index')
@section('title')
    
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
<div class="container">
    <form action="{{ route('remind.store') }}" method="post" role="form" class="form__auth">
        {!! csrf_field() !!}

        <div class="page-header">
            <h4>
                비밀번호 바꾸기
            </h4>
            <p class="text-muted">
                신청폼
            </p>
        </div>
          
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>
          
        <button class="btn btn-primary btn-lg btn-block" type="submit">
            Send
        </button>
    </form>
</div>
@endsection