@extends('layouts.index')
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
    <table class="table">
        <tr>
            <td>상품명</td>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <td>상품가격</td>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <td>상품설명</td>
            <td>{{ $product->content }}</td>
        </tr>
        <tr>
            <td>조회수</td>
            <td>{{ $product->hits }}</td>
        </tr>
        <tr>
            <td>생성일</td>
            <td>{{ $product->created_at }}</td>
        </tr>

        {{-- <tr>
			<th>첨부파일</th>
			<td>			
				<ul>
				@forelse($product->attachments as $attach)
					<li>
						<a href="{{'/files/' . Auth::user()->id . '/' . $attach->filename}}">
						    {{$attach->filename}}
						</a>
					</li>
				@empty <li>첨부파일 없음</li>	
				@endforelse	
				</ul>
			</td>
		</tr>	 --}}	
    </table>

    <div class="row" style="margin-left: 2%;">
        <button class="btn btn-primary" onclick="location.href='{{ route('products.index', ['page'=>$page]) }}'">List</button>
        <!--만약 로그인한 사용자의 id가 board객체의 user_id와 같으면!-->
        {{-- @if (Auth::user()->id == $board->user_id) --}}
            <button class="btn btn-warning" onclick="location.href='{{ route('products.edit', ['product'=>$product->id, 'page'=>$page]) }}'">Edit</button>
            <button class="btn btn-danger" onclick="location.href='{{ route('products.destroy', ['product'=>$product->id, 'page'=>$page]) }}'">Delete</button>
        {{-- @endif --}}
    </div>
@endsection