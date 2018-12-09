<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="" class="site-block-top-search">
              <span class="icon icon-search2"></span>
              <input type="text" class="form-control border-0" placeholder="Search">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="/" class="js-logo-clone">BIGBANG GOODS SHOP</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <!-- Right Side Of Navbar -->
              <ul>
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                    <li class="nav-item">
                      <a href="{{ route('sessions.create') }}">
                        Login
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('users.create') }}">
                        Register
                      </a> 
                    </li>
                  @else
                    <li><a href="#"><span class="icon icon-person"></span></a></li>
                    <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                    <li>
                      <a href="cart.html" class="site-cart">
                        <span class="icon icon-shopping_cart"></span>
                        <span class="count">2</span>
                      </a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                      </a>
          
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" role="menu">
                          <a class="dropdown-item" href="{{ route('sessions.destroy') }}">
                            Logout
                          </a>
                      </div>
                    </li>
                  @endif
                </ul>
            </div> 
          </div>

        </div>
      </div>
    </div> 
    <nav class="site-navigation text-right text-md-center"" style="margin-right:3.5%;" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
          <li class="has-children active">
            <a href="/">Home</a>
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
              <li class="has-children">
                <a href="#">Sub Menu</a>
                <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="{{ route('products.index') }}">Shop</a></li>
          <li onclick="button()"><a href="#">Review</a></li>
          <li><a href="{{ route('articles.index') }}">Q&A</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <script>
  function button() {
	  alert("준비중입니다");
  }
  </script>