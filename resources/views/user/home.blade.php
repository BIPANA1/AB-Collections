@extends('user.layout.main')

@section('content')
<div class="background-img"></div>
      <div class="center">
        <div class="title">We Bring The Good Cart To Life.</div>
        <div class="sub_title">Shop Now</div>
       
      </div>
    </div>

    <div class="products">
      <h1 class="product-heading">Products</h1>

      <div class="product-list">
        @foreach($products as $product)
        <div class="box">
          <div class="card">
            <img
              src="{{asset($product->image)}}"
              alt="Denim Jeans"
              style="width: 260px; height: 300px"
            />
            <h2>{{$product->productName}}</h2>
            <p class="price">{{$product->price}}</p>
            <p class="brand">{{$product->brand}}</p>
            <p class="stock">{{$product->category['name']}}</p>
            <p><button>Add to Cart</button></p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection
