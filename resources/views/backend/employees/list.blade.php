@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employees</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/employees/add') }}" class="btn btn-primary">Add Employees</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <section class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Employees</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-sm-1">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>First Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ Request()->name }}" placeholder="First Name">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="{{ Request()->last_name }}" placeholder="Last Name">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Email ID</label>
                                            <input type="email" name="email" class="form-control" value="{{ Request()->email }}" placeholder="Email ID">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                            style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/employees') }}" class="btn btn-success"
                                            style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Employees List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                   <thead>
                                       <tr>
                                           <td>ID</td>
                                           <td>First Name</td>
                                           <td>Last Name</td>
                                           <td>Email</td>
                                           <td>Profile Image</td>
                                           <td>Is Role</td>
                                           <td>Action</td>
                                       </tr>
                                   </thead>
                                    <tbody>
                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>
                                                @if(!empty($value->profile_image))
                                                    @if(file_exists('upload/'.$value->profile_image))
                                                        <img src="{{ url('upload/'.$value->profile_image) }}" style="height: 80px; width: 80px;">
                                                    @endif
                                                    <a href="{{ url('admin/employees_image/delete/'.$value->id) }} " onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                                @endif
                                            </td>
                                            <td>{{ !empty($value->is_role) ? "HR" : "Employees" }}</td>
                                            <td>
                                                <a href="{{ url('admin/employees/view/'.$value->id) }}" class="btn btn-info">View</a>
                                                <a href="{{ url('admin/employees/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/employees/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="100%">No Record Found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right">
                                    {!! $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
