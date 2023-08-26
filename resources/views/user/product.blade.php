@extends('user.layout.main')
@section('content')
<style>
    .card {
        margin-top: 45%;
        width: 300px;
    }

    img {
        margin-left: 8px;
    }
    .filter-dropdown {
            position: absolute;
            top: 15%; /* Adjust this value as needed */
            margin-left: 80%;
        }

        .dropdown-btn {
            background-color: white;
            border: 1px solid #ccc;
            color: #333;
            padding: 5px 10px;
            cursor: pointer;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            width: 150px;
            z-index: 1;
        }

        .dropdown-btn:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item {
            padding: 8px 10px;
            text-decoration: none;
            color: #333;
            display: block;
        }

        .dropdown-item:hover {
            background-color: #f2f2f2;
        }
    
   
</style>

<!-- Beautiful Dropdown Menu -->
<div class="filter-dropdown">
        <div class="dropdown-btn">
            <span class="fa-solid fa-filter"></span> Filter
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/show-category">Category</a>
                <a class="dropdown-item" href="/show-highestprice">Highest Price</a>
            </div>
        </div>
    </div>



    <div class="product-list">
    @foreach($products as $product)
    <div class="box">
      <div class="card">
        <img src="{{asset($product->image)}}" alt="Denim Jeans" style="width: 260px; height: 300px" />
        <h2>{{$product->productName}}</h2>
        <p class="price">{{$product->price}}</p>
        <p class="brand">{{$product->brand}}</p>
        <p class="stock">{{$product->category['name']}}</p>

        @if($product->stock > 0)
        <form action="/addCart/{{$product->id}}" method="POST">
          @csrf
          <p><button type="submit">Add to Cart</button></p>
        </form>
        @else
        <p> <strong>Out of Stock </strong> </p>
        @endif
      </div>
    </div>
    @endforeach
  </div>




@endsection