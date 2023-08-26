<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('/css/homepage.css')}}" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/2d2642681e.js" crossorigin="anonymous"></script>

  <style>
    .dropdown-menu .dropdown-item {
      font-size: 0.8rem;
    }
  </style>
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

                  <li><a style="font-size: 23px" href="/login">Login</a></li>
                  <li><a style="font-size: 23px" href="/register">Register</a></li>
              
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
      @foreach($products as $product)
      <div class="box">
        <div class="card">
          <img src="{{asset($product->image)}}" alt="Denim Jeans" style="width: 260px; height: 300px" />
          <h2></h2>
          <p class="price">{{$product->price}}</p>
          <p class="brand">{{$product->brand}}</p>
          <p class="stock">{{$product->category['name']}}</p>
          <p><button>Add to Cart</button></p>
        </div>
      </div>
      @endforeach


      <script>
        function toggleDropdown() {
          var dropdown = document.getElementById("dropdown");
          dropdown.style.display =
            dropdown.style.display === "none" ? "block" : "none";
        }
      </script>
</body>

</html>