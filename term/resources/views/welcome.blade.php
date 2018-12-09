@extends('layouts.index')
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->has('flash_message'))
                <div class="alert alert-info" role="alert" style="text-align:center;">
                    {{ session('flash_message') }}
                </div>
            @endif
            @include('flash::message')
        </div>
    </div>
    @include('layouts.header')
@endsection
@section('banner')
    @include('layouts.banner')
@endsection
@section('content1')
<div class="container">
    
</div>
@endsection