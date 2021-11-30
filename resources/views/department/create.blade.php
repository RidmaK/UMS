@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments Creation</h1>
</div>
    <div class="card mx-auto col-md-8">
        <div class="card-header">
            City Creation
            <a href="{{ route('departments.index') }}" style="float: right" class="btn btn-primary">Back</a>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('departments.store') }}" class="user">
                @csrf
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
