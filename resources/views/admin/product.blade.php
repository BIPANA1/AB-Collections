<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Product Page</title>
    <link rel="stylesheet" href="{{asset('css/product.css')}}" />
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
            <div class="product-heading">
                <div class="add-product">
                    <h2>Products</h2>
                </div>
                <div class="add-product">
                    <a href="/addproduct"><button class="add-btn">
                            <span>Add Product</span>
                        </button></a>

                </div>
            </div>
            <div class="table-container">
                <table class="ProductTable">

                    <tr>
                        <th>Product ID</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>

                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td><img class="product-img" src="{{asset($product->image)}}" alt="" /></td>
                        <td>{{$product->productName}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->brand}}</td>
                        <td>{{$product->category['name']}}</td>
                        <td>
                            <a href="/edit-product{{$product->id}}"> <button class="Edit">Edit</button></a>
                            <a href="/delete-product/{{$product->id}}"> <button class="Delete">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</body>

</html>