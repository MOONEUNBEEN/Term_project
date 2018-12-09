@extends('layouts.index')
@section('title')
    
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
<div class="container">
    <form action="{{ route('reset.store') }}" method="POST" role="form" class="form__auth">
        {!! csrf_field() !!}
    
        <input type="hidden" name="token" value="{{ $token }}">
    
        <div class="page-header">
          <h4>비밀번호 바꾸기</h4>
          <p class="text-muted">
            비밀번호 바꾸기
          </p>
        </div>
    
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
          {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>
    
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="New_Password">
          {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>
    
        <div class="form-group">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm_Password">
          {!! $errors->first('password_confirmation', '<span class="form-error">:message</span>') !!}
        </div>
    
        <button class="btn btn-primary btn-lg btn-block" type="submit">
          Change
        </button>
    </form>
  </div>
@endsection