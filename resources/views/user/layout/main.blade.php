<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">
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
                    <a href="/home"> <img src="/Image/ESBA.png" alt="ESBA Logo" style="height: 40px; width: 90px"> </a>
                </div>
                
                <ul>
                <li><a style="font-size: 18px" href="/create-products">Product</a></li>
              
                                
                </ul>
                <div class="logo search-div">
                    <div class="input-group">
                        <input type="text" class="input" name="search" placeholder="Search">
                        <input class="button--submit" value="Search" type="submit">
                    </div>
                </div>
                <div class="home">
                    <div>
                        <ul style="margin-top: 10px">
                            <li><a style="font-size: 18px; background-color: white; color: black;" href="/home">Home</a></li>
                            <li><a style="font-size: 18px" href="#">View Cart</a></li>
                            
                       
                    <div style="margin-left: 30px">
                        @if(auth()->check())
                        @php
                        $avatar = auth()->user()->avatar ? asset('avatars/' . auth()->user()->avatar) : asset('default-avatar.png');

                        @endphp
                        <img id="profile-img" name="avatar" class="user-img" onclick="toggleDropdown();" src=" {{$avatar}} " alt="Profile Image">
                        <div class="click-img" id="dropdown">
                            <a href="/create">Edit Profile</a>
                            <a href="/view-profile">View Profiles</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                        @else
                        <li><a style="font-size: 18px" href="{{ route('login') }}">Login</a></li>
                        <li><a style="font-size: 18px" href="{{ route('register') }}">Register</a></li>
                        @endif
                    </div>
                    <li><a style="font-size: 23px" href=""><i class="fa-solid fa-cart-plus"></i></a></li> 

                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>
    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("dropdown");
            dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
        }
    </script>
</body>

</html>