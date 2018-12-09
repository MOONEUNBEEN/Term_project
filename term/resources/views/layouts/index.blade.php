<!DOCTYPE html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <link rel="icon" href="/img/bangbong.png"/>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/jquery-ui.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="/css/aos.css">

    <link rel="stylesheet" href="/css/style.css">
    @yield('cssNscript') 
  </head>
  <body>
  
  <div class="site-wrap">
    @yield('header')

    @yield('banner')

    <div class="site-section site-section-sm site-blocks-1">
        @yield('content1')
    </div>

    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <b> CALL CENTER<br>
            01047576371</b>
            <br><br>
            
            평일 AM 10:00~PM 07:00<br>
            
            점심 PM 01:00~PM 02:00<br>
            
            주말,공휴일은 휴무
          </div>
          <div class="col-sm">
              <b>CUSTOMER CENTER</b>
              <br><br><br>
              <a href="">구매 내역</a>
              <br>
              <a href="">NOTICE</a>
              <br>
              <a href="">FAQ</a>
              <br>
              <a href="">1:1문의</a>          
          </div>
          <div class="col-sm">
              <b>MY SHOP</b>
              <br><br><br>
              <a href="">회원정보</a>
              <br>
              <a href="">SHOPPING BAG</a>
              <br>
              <a href="">HEART</a>
              <br>
              <a href="">마일리지</a>
              <br>
              <a href="">MY PAGE</a>
          </div>
          <div class="col-sm">
              <b>YG FAMILY SITE</b>
              <br><br><br>
              <a href="http://www.ygfamily.com/">YG FAMILY</a>
              <br>
              <a href="http://www.yg-life.com/">YG LIFE</a>
              <br>
              <a href="http://www.ygplus.com/">YG PLUS</a>          
              <br>
              <a href="https://www.youtube.com/user/OfficialYGM">YG MUSIC</a>          
              <br>
              <a href="http://www.yg-audition.com/next-generation/">YG AUDITION</a>          
              <br>
              <a href="http://www.ygfamily.com/ygwith/campaign.asp">YG WITH</a>          
              <br>
              <a href="https://www.instagram.com/ygselect/">INSTAGRAM</a>          
              <br>
              <a href="https://www.facebook.com/ygfamily">FACEBOOK</a>          
          </div>
          <div class="col-sm">
              <b>ABOUT US</b>
              <br><br><br>
              <a href="">회사소개</a>
              <br>
              <a href="">이용약관</a>
              <br>
              <a href="">개인정보처리방침</a>
              <br>
              <a href="">사업자정보확인</a>
              <br>
              <a href="">파트너사 제휴제안</a>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | 2WDJ 1701103 MEB
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="/js/jquery-3.3.1.min.js"></script>
  <script src="/js/jquery-ui.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/aos.js"></script>

  <script src="/js/main.js"></script>
  @yield('script')  
  </body>
</html>