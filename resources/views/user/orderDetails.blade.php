@extends('user.layout.main')
@section('content')


<style>
    table,
    th,
    td {
        border: 1px solid black;
    }

    table {
        width: 80%;
        height: 20%;
        border-collapse: collapse;
        margin-top: 10%;
        margin-left: 10%;
        margin-bottom: 20%;


    }


    th {
        background-color: rgb(118, 118, 247);
        color: #fef8f8;
        padding: 15px;
        text-align: left;
    }

    td {

        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
    }
</style>

<table>

    <tr>
        <th>Order ID</th>
        <th>Product ID</th>
        <th>Product quantity</th>
        <th>Total price</th>
        <th>Ordered date</th>
        <!-- <th>Action</th> -->

    </tr>
    @foreach($orderDetails as $detail)
    <tr>
        <td>{{$detail->order_id}}</td>
        <td>{{$detail->product_id}}</td>
        <td>{{$detail->qty}}</td>
        <td>{{$detail->product_price}}</td>
        <td>{{$detail->created_at}}</td>

        <!-- <td>
  <div> <button type="button" class="btn btn-dark btn-sm"> <a href="/delete-details/{$detail->id}"> Remove </button> </a> </div>
   </td> -->
    </tr>


    @endforeach
</table>












@endsection