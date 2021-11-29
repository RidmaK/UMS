@extends('layouts.main')

@section('content')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">countries</h1>
</div>

<script>
    function check(){
        $.alert({
        title: 'Alert!',
        content: 'Simple alert!',
        });
    }
</script>
    <div class="card mx-auto">
        <div class="card-header">
            <form action="{{ route('countries.index') }}" method="GET" class="row row-cols-lg-auto g-3">
                <div class="col">
                    <input  type="text" name="search" class="form-control" id="inline-form-name"
                        placeholder="Search....">
                </div>


                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                <div class="col">
                    <a href="{{ route('countries.create') }}" class="float-right"><h1><i class="fas fa-plus-circle"></i></h1></a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary" style="color: #fff">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>country Name</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary" style="color: #fff">
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>country Name</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($countries as $country)
                            <tr>
                                <td>{{ $country->id }}</td>
                                <td>{{ $country->country_code }}</td>
                                <td>{{ $country->name }}</td>
                                <td>
                                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
