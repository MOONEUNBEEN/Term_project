@extends('layouts.index')

@section('title')
UPLOAD_PRODUCT
@endsection
@section('title')
    BIGBANG GOODS SHOP
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('cssNscript')
    <link href="/dist/dropzone.css" rel="stylesheet">
    <script src="/dist/dropzone.js"></script>
@endsection

@section('content1')
<div class="container">
  <h2>새 상품올리기</h2>
  <p>아래의 모든 필드를 채워주세요.</p>
  <form id="store" action="{{route('products.store')}}" method="post">
    @csrf
    <div class="form-group">
      <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{old('name')}}"
      required>
      <div>
          @if($errors->has('name'))
            <span class="warning">
             {{$errors->first('name')}}
            </span>
          @endif
      </div>
    </div>   
    <div class="form-group">
      <input type="text" class="form-control" id="price" name="price" placeholder="Product Price" value="{{old('price')}}"
      required>
      <div>
          @if($errors->has('price'))
            <span class="warning">
             {{$errors->first('price')}}
            </span>
          @endif
      </div>
    </div>   
    <div class="form-group">
        <label for="content">상품설명</label>
        <textarea class="form-control" rows="5" id="content" name="content"
        required>{{old('content')}}</textarea>
        <div>
            @if($errors->has('content'))
              <span class="warning">
               {{$errors->first('content')}}
              </span>
            @endif  
        </div>        
      </div>
  </form>

  <form action="{{route('attachments.store')}}"
      class="dropzone"
      id="dropzone" method="post" enctype="multipart/form-data">
          @csrf
  </form>


<div style="margin-top:2%;" >
  <button type="button" class="btn btn-primary" onclick="$('#store').submit()">
  글등록
  </button>
  <a class="btn btn-dange" href="{{route('products.index',['page'=>1])}}">목록보기</a>
</div>
</div>
<script type="text/javascript">
  Dropzone.options.dropzone = {
      addRemoveLinks: true,
      /* removedfile: function(file) {
              var name = file.upload.filename;
              var fileid = file.upload.id;
              $.ajax({
                  headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                  type: 'DELETE',
                  url: '/attachments/'+fileid,
                  data: {filename: name},
                  success: function (data){
                      //console.log("File has been successfully removed!!");
                      alert(data + 'has been successfully removed!!');
                  },
                  error: function(e) {
                      //console.log(e);
                      alert(e);
                  }});
                  var fileRef;
                  return (fileRef = file.previewElement) != null ? 
                  fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },  */   
      success: function(file, response) {
          //alert(response.filename);
          file.upload.id = response.id;
          $("<input>", {type:'hidden', name:'attachments[]', value:response.id}).appendTo($('#store'));
      },
      error: function(file, response){
         return false;
      }
  }
</script>
@endsection