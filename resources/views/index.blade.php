@extends('layouts.layout')

@section('content')
<div class="container-fluid">
    @if (session('mssg')) 
    <div class="alert alert-success mssg" role="alert">
        {{ session('mssg') }}
    </div>
    @endif
    @if ($errors->all()) 
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $message)  
        <li>{{ $message }}</li>
        @endforeach
    </div>
    @endif
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home</h1>
        <a href="#" id="addUser" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50" type="submit"></i> Add User</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Job Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Job Title</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->surname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
                                <td>{{ $user->jobtitle }}</td>
                                <td><a href="/edit/{{$user->id}}" name="{{$user}}" id="editUser{{$user->id}}" class="btn btn-primary btn-circle x">
                                    <i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection