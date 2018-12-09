@extends('layouts.index')
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
<form action="{{ route('products.update', ['product'=>$product->id, 'page'=>$page]) }}" method="POST">
        @csrf
        @method('patch')
        <label for="">
            <input type="text" name="name" value="{{ $product->name }}">
            <span>
                @if ($errors->has('name'))
                   {{ $errors->first('name') }} 
                @endif
            </span>
        </label>
        <br>
        <label for="">
            <input type="text" name="price" value="{{ $product->price }}">
            <span>
                @if ($errors->has('price'))
                   {{ $errors->first('price') }} 
                @endif
            </span>
        </label>
        <br>
        <label for="">
            상품설명
            <textarea name="content">{{ $product->content }}</textarea>
            <span>
                @if ($errors->has('content'))
                    {{ $errors->first('content') }}
                @endif
            </span>
        </label>
        <div><h3>첨부파일</h3></div>      
        <ul>
        @forelse($row->attachments as $attach)
            <li>
            <a href="{{'/files/' . Auth::user()->id . '/' . $attach->filename}}">
            {{$attach->filename}} 
            </a>
            <input type="checkbox" class="glyphicon glyphicon-trash" value="{{$attach->id}}" name="del_attachments[]"> Delete
            </li>
        @empty <li>첨부파일 없음</li> 
        @endforelse 
        </ul>
        <br>
        <button class="btn btn-primary">Edit</button>
    </form>
@endsection