@extends('layouts.main')

@section('content')

 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
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
            <form action="{{ route('users.index') }}" method="GET" class="row row-cols-lg-auto g-3">
                <div class="col">
                    <input  type="text" name="search" class="form-control" id="inline-form-name"
                        placeholder="Search....">
                </div>


                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                <div class="col">
                    <a href="{{ route('users.create') }}" class="float-right"><h1><i class="fas fa-plus-circle"></i></h1></a>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary" style="color: #fff">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tfoot class="bg-primary" style="color: #fff">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Manage</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success"><i class="fas fa-user-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
