<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('/css/homepage.css')}}" />
</head>

<body>
  <div class="home">
    <nav>
      <div class="menu">
        <div class="logo">
          <img src="/Image/ESBA.png" style="height: 40px; width: 90px" alt="" />
        </div>
        <div class="logo search-div">
          <div class="input-group">
            <input type="text" class="input" name="search" placeholder="Search" />
            <input class="button--submit" value="Search" type="submit" />
          </div>
        </div>
        <div class="home">
          <div>
            <ul style="margin-top: 10px">
              <li>
                <a style="
                      font-size: 23px;
                      background-color: white;
                      color: black;
                    " href="/home">Home</a>
              </li>
              <li><a style="font-size: 23px" href="#">View Cart</a></li>
            
          @if(auth()->user())
          <div style="margin-left: 30px">
            <img class="user-img" onclick="toggleDropdown();" src="/Image/image.png" alt="" />
            <div class="click-img" id="dropdown">
              <!-- <a href="/edit-profile">Edit Profile</a>
                            <a href="#">View Profile</a> -->
              @if(auth()->user())
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
              @else

              <a class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </a>
              <a class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </a>
              @endif
              @else
              <li><a style="font-size: 23px" href="/login">Login</a></li>
              <li><a style="font-size: 23px" href="/register">Register</a></li>
              @endif
              </ul>
          </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="background-img"></div>
    <div class="center">
      <div class="title">We Bring The Good Cart To Life.</div>
      <div class="sub_title">Shop Now</div>
      <!-- <div class="btns">
        <button class="signin"> <a href="/login"> SIGN IN</a> </button>
        <button class="signup"> <a href="/register"> SIGN UP </a></button>
      </div> -->
    </div>
  </div>

  <div class="products">
    <h1 class="product-heading">Products</h1>

    <div class="product-list">
      <div class="box">
        <div class="card">
          <img src="/Image/cloth.jpg" alt="Denim Jeans" style="width: 260px; height: 300px" />
          <h2>Chiffon Floral Printed</h2>
          <p class="price">Rs. 1,399</p>
          <p class="brand">Brand</p>
          <p><button>Add to Cart</button></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleDropdown() {
      var dropdown = document.getElementById("dropdown");
      dropdown.style.display =
        dropdown.style.display === "none" ? "block" : "none";
    }
  </script>
</body>

</html>