@extends('layouts.index')
@section('title')
    register
@endsection
@section('header')
    @include('layouts.header')
@endsection
@section('content1')
<div class="container">
    <div class="row justify-content-center align-items-center">
    <form action="{{ route('users.store') }}" method="post" class="form_auth" style="width:50%;">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" autofocus/>
            {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
        </div>
      
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}"/>
            {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>
      
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="Password"/>
            {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>
      
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm_Password" />
            {!! $errors->first('password_confirmation', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('nic') ? 'has-error' : '' }}">
            <input type="nic" name="nic" class="form-control" placeholder="Nic" value="{{ old('nic') }}"/>
            {!! $errors->first('nic', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
            <input type="phone" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}"/>
            {!! $errors->first('phone', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="">
            <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                <input type="zipcode" name="zipcode" id="zipcode" class="form-control" placeholder="Zipcode" value="{{ old('zipcode') }}"/>
                {!! $errors->first('zipcode', '<span class="form-error">:message</span>') !!}
            </div>
        </div>

        <div class="form-group">
            <div class="">
                <input type="button" class="btn btn-primary btn-block" value="Find Zipcode"  onclick="daumPostcode()">
            </div>
        </div>

        <div class="form-group {{ $errors->has('addr1') ? 'has-error' : '' }}">
            <input type="addr1" name="addr1" id="addr1" class="form-control" placeholder="Addr1" value="{{ old('addr1') }}"/>
            {!! $errors->first('addr1', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group {{ $errors->has('addr2') ? 'has-error' : '' }}">
            <input type="addr2" name="addr2" id="addr2" class="form-control" placeholder="Addr2" value="{{ old('addr2') }}"/>
            {!! $errors->first('addr2', '<span class="form-error">:message</span>') !!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
        </div>
    </form>
    </div>
</div>
@endsection

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
    function daumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;

                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if(data.userSelectedType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('zipcode').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('addr1').value = fullAddr;

                // 커서를 상세주소 필드로 이동한다.
                document.getElementById('addr2').focus();
            }
        }).open();
    }
</script>