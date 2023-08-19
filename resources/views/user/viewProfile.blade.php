@extends('user.layout.main')

@section('content')





<div class="container" id="product-section" style="padding-top: 100px; padding-bottom:70px;">
    <div class="row">
        <div class="col-md-6">
            @if(auth()->check())
            @php
            $avatar = auth()->user()->avatar ? asset('avatars/' . auth()->user()->avatar) : asset('default-avatar.png');
            @endphp
            <img src="{{$avatar}}" alt="Profile Image" width="400px" height="430px" />
            @endif
        </div>
    <div class="col-md-6">
      <h2>{{Auth::user()->name}}</h2>
      <p> <strong> Email </strong> {{Auth::user()->email}}</p>
      <p><strong> Address: </strong> : {{Auth::user()->address}}</p>
      <p> <strong> Contact: </strong> {{Auth::user()->phone}}</p>
    </div>
  </div>
</div>






@endsection