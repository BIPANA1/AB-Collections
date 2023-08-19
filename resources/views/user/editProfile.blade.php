@extends('user.layout.main')

@section('content')
<title>Edit Profile</title>

<style>
   .profile-form {
        max-width: 500px;
        margin: 15% auto;
        text-align: center;
    }

    .profile-form .form-group {
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .profile-form label {
        font-weight: bold;
        width: 100px; /* Adjust as needed */
    }

    .profile-form input[type="text"],
    .profile-form input[type="email"],
    .profile-form input[type="password"],
    .profile-form input[type="file"] {
        background-color: #f2f2f2;
        border: none;
        border-radius: 10px;
        padding: 10px;
        color: #333;
        width: 100%;
    }

    .profile-form .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        width: 100%;
    }

    .card-header {
        background-color: #333;
        color: white;
        font-weight: bold;
        border-bottom: none;
    }
</style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card profile-form">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                       
                            @csrf
                            <!-- Profile fields -->
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control" name="email" readonly value="{{Auth::user()->email}}" required autocomplete="email">
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}</label>
                                <input id="address" type="text" class="form-control" name="address" value="{{Auth::user()->address}}" required autocomplete="address">
                            </div>
                            <div class="form-group">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input id="phone" type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" required autocomplete="phone">
                            </div>

                            <div class="form-group">
                                <label for="avatar">{{ __('Avatar') }}</label>
                                <input id="avatar" type="file" class="form-control-file" name="avatar" >
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('New Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">{{ __('Confirm New Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>

                            <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>







    @endsection

