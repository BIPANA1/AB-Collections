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
@endsection