@extends('user.layout.main')
@section('content')


<style> 
.form{
    width: 400px;
    height: 470px;
    margin: auto;
    padding: 20px;
    border: 1px solid #090909;
    border-radius: 8px;
    margin-top: 4%;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
    border: 1px solid #ccc;
    margin-top: 10%;

}
h3{
    margin-top: 12px;
    text-decoration:underline;
    font-size: 1.5rem;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    
}
button{
   margin: auto;
}


</style>

  <div class="container">
    
    <form class="form"  action="/order" method="post">
      @csrf

    <h3 style="margin-left: 28%;">Checkout</h3>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name ="customer_name" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="contact">Contact</label>
        <input type="number" name="contact" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="message">Message</label>
        <textarea type="text" name="message" class="form-control" required></textarea>
      </div>
      <br>

      <button type="submit" class="btn btn-primary">   Place Order </button>
    </form>
  </div>











@endsection