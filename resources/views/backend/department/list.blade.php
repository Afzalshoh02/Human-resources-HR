@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Department</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">

                        <form action="{{ url('admin/department_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a class="btn btn-success" href="{{ url('admin/department_export?start_date='.Request::get('start_date').'&end_date=').Request::get('end_date') }}">Excel Export</a>
                        </form>
                        <br>
                        <a href="{{ url('admin/department/add') }}" class="btn btn-primary">Add Department</a>
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
                                <h3 class="card-title">Search Department</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-1">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Department Name</label>
                                            <input type="text" name="department_name" class="form-control" value="{{ Request()->department_name }}" placeholder="Enter Department Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Locations Name</label>
                                            <input type="text" name="locations_id" class="form-control" value="{{ Request()->locations_id }}" placeholder="Enter Locations Name">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>From Date (Start Date)</label>
                                            <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}" >
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>To Date (End Date)</label>
                                            <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}" >
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                    style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/department') }}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Location List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Department Name</td>
                                        <td>Manager Name</td>
                                        <td>Locations Name</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->department_name }}</td>
                                            <td>
                                                @if($value->manager_id == 1)
                                                    Vipul
                                                @else
                                                    Dio
                                                @endif
                                            </td>
                                            <td>{{ $value->street_address }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/department/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/department/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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
