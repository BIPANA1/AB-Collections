@extends('user.layout.main')
@section('content')


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Make sure to include jQuery library in your project -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  /* Styles for the quantity container */
  .quantity-container {
    display: flex;
    align-items: center;
    justify-content: center;
    


  }

  /* Styles for the quantity input */
  .quantity-input {

    width: 50px;
    text-align: center;
    border: none;


  }

  /* Styles for the quantity buttons */
  .quantity-btn {
    margin: 2px;
    width: 25px;
    height: 25px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 2px;
    cursor: pointer;
  }

  /* Styles for the hover effect on buttons */
  .quantity-btn:hover {
    background-color: #e0e0e0;
  }

  /* Remove default arrow on number input */
  input[type="number"]::-webkit-inner-spin-button,
  input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  input[type="number"] {
    -moz-appearance: textfield;
  }

  .dlt-btn {
    padding: 6px 8px;
    border: black;
    background-color: black;
    color: #e0e0e0;
    border-radius: 3px;
  }

  .dlt-btn:hover {
    padding: 6px 8px;
    border: black;
    background-color: black;
    border-radius: 3px;
    text-decoration: none;
  }

  .btn{
    margin-left: 90%;
    padding: 6px 8px;
    border: black;
    background-color: black;
    color: #e0e0e0;
    border-radius: 3px;

  }

  a {
    color: white;
  }
</style>




<div class="container" style="margin-top: 8%;">
  <h1>Your Cart</h1>
  @if($carts->count() > 0)
  <div class="table-responsive">
    <div>
      <button class="btn"> <a href=""> checkout </a> </button>
    </div>
    <br>
    <form action="/updateQuantity" method="POST">
      @csrf
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($carts as $item)
          <tr>
            <td>
              <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" width="100" height="100">
            </td>
            <td>{{ $item->product['productName'] }}</td>
            <td>
              <div class="quantity-container">
                <input type="hidden" name="cart_id" value="{{ $item->id }}">
                <input type="number" class="quantity-input" name="quantity" value="{{ $item->quantity }}" min="1">
                <button class="quantity-btn" id="decrease-btn">-</button>
                <button class="quantity-btn" id="increase-btn">+</button>
              </div>
            </td>
            <td>{{ $item->product['price']* $item->quantity}}</td>
            <td>
             
              <button class="dlt-btn"> <a href="/destroy-cart/{{$item->id}}"> Remove </a>
                
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </form>
  </div>
  @else
  <p>Your cart is empty.</p>
 @endif
</div>

<script>
  // Wait for the document to be ready
  $(document).ready(function() {
    // Get the quantity input field
    var quantityInput = $('.quantity-input');
    var priceSpan = $('.price');
    // Get the decrease and increase buttons
    var decreaseBtn = $('#decrease-btn');
    var increaseBtn = $('#increase-btn');

    // Handle the click event for the decrease button
    decreaseBtn.click(function() {
      var currentValue = parseInt(quantityInput.val());
      if (currentValue > 1) {
        quantityInput.val(currentValue - 1);
        updatePrice(currentValue - 1)
      }
    });

    // Handle the click event for the increase button
    increaseBtn.click(function() {
      var currentValue = parseInt(quantityInput.val());
      quantityInput.val(currentValue + 1);
      updatePrice(currentValue + 1);
    });

    // Handle the input event for the quantity input field
    quantityInput.on('input', function() {
      var currentValue = parseInt(quantityInput.val());
      updatePrice(currentValue);
    });
    // Function to update the displayed price
    function updatePrice(quantity) {
      var price = parseFloat(priceSpan.text());
      var updatedPrice = price * quantity;
      priceSpan.text(updatedPrice.toFixed(2));
    }
  });
</script>



@endsection