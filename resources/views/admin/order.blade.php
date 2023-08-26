<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Product Page</title>
    <link rel="stylesheet" href="{{asset('css/product.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        width: 10%;
        height: 10%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-left: 15%;


    }

    th {
        background-color: #696161;
        color: #fef8f8;
        padding: 10px;
        text-align: left;
    }

    td {
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
    }
</style>

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
                        <a href="/order" class="icon-a"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;&nbsp; Order
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


            <table>

                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>contact</th>
                    <th>message</th>
                    <th>Product ID</th>
                    <th>Product quantity</th>
                    <th>Total price</th>
                    <th>Ordered date</th>
                    <th>Action</th>

                </tr>
                @foreach($orderDetails as $detail)
                @foreach($orders as $order)

                <tr>
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->contact}}</td>
                    <td>{{$order->message}}</td>
                    <td>{{$detail->product_id}}</td>
                    <td>{{$detail->qty}}</td>
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                    <a href="/delete-order/{{$detail->id}}"> <button class="Delete">Delete</button></a>
                    </td>

                </tr>

                @endforeach
                @endforeach
            </table>

</body>

</html>