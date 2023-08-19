<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Add Product</title>
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
                        <a href="" class="icon-a"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;
                            Dashboard
                        </a>
                    </li>
                    <!-- <li>
              <a href="" class="icon-a"
                ><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;
                Customer
              </a>
            </li> -->
                    <li>
                        <a href="" class="icon-a"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;&nbsp; Order
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
                <input class="btn" type="button" value="LOGOUT" />
            </div>
            <div class="form">
                <form action="/update-product/{{$product->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="product-input-dtls">
                        <label for="productName">Product Name</label>
                        <input type="text" name="productName" id="productName" value="{{$product->productName}}" />
                        <label for="price">Quantity</label>
                        <input type="text" name="stock" id="stock" value="{{$product->stock}}" />
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" value="{{$product->price}}" />
                        <label for=" brand">Brand</label>
                        <input type="text" name="brand" id="brand" value="{{$product->brand}}" />
                        <label for="productImg">Upload Image</label>
                        <img src="{{asset($product->image)}}" alt="" width="80">
                        <input type="file" name="image" id="productImg" />
                    </div>
                    <input type="submit" value="Update product" placeholder="Add" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>