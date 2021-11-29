@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">countries Creation</h1>
</div>
    <div class="card mx-auto col-md-8">
        <div class="card-header">
            User Creation
            <a href="{{ route('countries.index') }}" style="float: right" class="btn btn-primary">Back</a>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('countries.store') }}" class="user">
                @csrf
                <div class="form-group">
                            <input id="country_code" type="text" class="form-control form-control-user @error('country_code') is-invalid @enderror"
                             name="country_code" value="{{ old('country_code') }}" autocomplete="country_code" autofocus placeholder="Country Code">

                            @error('country_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="form-group">
                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                    name="name" value="{{ old('name') }}" autocomplete="name" autofocus  placeholder="Name" >

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Create') }}
                </button>

            </form>
        </div>
    </div>
@endsection
