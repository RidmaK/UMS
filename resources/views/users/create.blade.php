@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users Creation</h1>
</div>
    <div class="card mx-auto col-md-8">
        <div class="card-header">
            User Creation
            <a href="{{ route('users.index') }}" style="float: right" class="btn btn-primary">Back</a>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}" class="user">
                @csrf
                <div class="form-group">
                    <input id="user_name" type="text" class="form-control form-control-user @error('user_name') is-invalid @enderror"
                    name="user_name" value="{{ old('user_name') }}" autocomplete="user_name" autofocus  placeholder="User Name" >

                    @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                            <input id="first_name" type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror"
                             name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus placeholder="First Name">

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="form-group">
                        <input id="last_name" type="text"
                        class="form-control form-control-user @error('last_name') is-invalid @enderror"
                        name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus  placeholder="Last Name">

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input id="email" type="email"  placeholder="Email Address" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                        <input id="password" type="password"  placeholder="Password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Register') }}
                </button>

            </form>
        </div>
    </div>
@endsection
