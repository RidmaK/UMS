@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users Update</h1>
</div>
    <div class="card mx-auto col-md-8">
        <div class="card-header">
            User Update
            <a href="{{ route('users.index') }}" style="float: right" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update' ,$user->id) }}" class="user">
                @csrf

                @method('PUT')
                <div class="form-group">
                    <input id="user_name" type="text" class="form-control form-control-user @error('user_name') is-invalid @enderror"
                    name="user_name" value="{{ old('user_name',$user->user_name) }}" required autocomplete="user_name" autofocus  placeholder="User Name" >

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                            <input id="first_name" type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror"
                             name="first_name" value="{{ old('first_name',$user->first_name) }}" required autocomplete="first_name" autofocus placeholder="First Name">

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="form-group">
                        <input id="last_name" type="text"
                        class="form-control form-control-user @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name',$user->last_name) }}" required autocomplete="last_name" autofocus  placeholder="Last Name">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input id="email" type="email"  placeholder="Email Address" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Updare User') }}
                </button>

            </form>
        </div>
        <form action="{{ route('users.destroy',$user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mb-2">DELETE {{ $user->user_name }}</button>
        </form>

    </div>
    <div class="card mx-auto col-md-8 mt-3">
            <div class="card-header">
                Change Password
            </div>
        <div class="card-body">

            <form method="POST" action="{{ route('users.change.password',$user->id) }}" class="user">
                @csrf
                <div class="form-group">
                        <input id="password" type="password"  placeholder="Password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control  form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat Password">

                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Change Password') }}
                </button>
            </form>
        </div>
    </div>
@endsection
