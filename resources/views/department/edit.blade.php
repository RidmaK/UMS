@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments Update</h1>
</div>
    <div class="card mx-auto col-md-8">
        <div class="card-header">
            Department Update
            <a href="{{ route('departments.index') }}" style="float: right" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('departments.update' ,$department->id) }}" class="country">
                @csrf

                @method('PUT')
                <div class="form-group">
                            <input id="name" type="text" class="form-control form-control-country @error('name') is-invalid @enderror"
                             name="name" value="{{ old('name',$department->name) }}" required autocomplete="name" autofocus placeholder="First Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-country btn-block">
                    {{ __('Updare City') }}
                </button>

            </form>
        </div>
        <form action="{{ route('departments.destroy',$department->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mb-2">DELETE {{ $department->name }}</button>
        </form>

    </div>
@endsection
