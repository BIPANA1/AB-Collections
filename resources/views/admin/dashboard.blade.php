<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/addproduct.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <div class="main-container">
        <div class="wrapper box1">
            <div class="sidebar">
                <div class="img">
                    <img class="image-logo" src="/Image/ESBA.png" alt="" />
                </div>
                <ul>
                    <li>
                        <a href="/home" class="icon-a"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="" class="icon-a"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;
                            Customer
                        </a>
                    </li>
                    <li>
                        <a href="" class="icon-a"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;&nbsp; Order
                        </a>
                    </li>
                    <li>
                        <a href="/category" class="icon-a"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;&nbsp; Category
                        </a>
                    </li>
                    <li style="background-color: #4414a4">
                        <a href="/product" class="icon-a" style="color: white"><i class="fa fa-product-hunt" aria-hidden="true"></i>&nbsp;&nbsp; Product
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="box2">
            <div class="box2-header">
                <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class=" fs-4 text-white navbar-brand"> {{ __('Logout') }}</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>

            </div>

        </div>
    </div>
</body>

</html>