@extends('layouts.index')
@section('title')
SHOP
@endsection
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
<div class="container">
<table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Hits</th>
        </tr>
    @foreach ($msgs as $msg)
        <tr>
            <td>
                <a href="{{ route('products.show', ['product'=>$msg->id, 'page'=>$page]) }}">
                    {{ $msg->name }}
                </a>
            </td>
            <td>{{ $msg->price }}</td>
            <td>{{ $msg->hits }}</td>
        </tr>
    @endforeach
</table>
<button class="btn btn-primary" onclick="location.href='{{ route('products.create') }}'">Upload</button>
{{ $msgs->links() }}
</div>
@endsection