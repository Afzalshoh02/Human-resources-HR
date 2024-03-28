@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manager</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">

                        <form action="{{ url('admin/manager_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a class="btn btn-success" href="{{ url('admin/manager_export?start_date='.Request::get('start_date').'&end_date=').Request::get('end_date') }}">Excel Export</a>
                        </form>
                        <br>
                        <a href="{{ url('admin/manager/add') }}" class="btn btn-primary">Add Manager</a>
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
                                <h3 class="card-title">Search Manager</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-sm-3">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Manager Name</label>
                                            <input type="text" name="manager_name" class="form-control" value="{{ Request()->manager_name }}" placeholder="Manager Name">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Manager Email</label>
                                            <input type="text" name="manager_email" class="form-control" value="{{ Request()->manager_email }}" placeholder="Manager Email">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Manager Mobile</label>
                                            <input type="text" name="manager_mobile" class="form-control" value="{{ Request()->manager_mobile }}" placeholder="Manager Mobile">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>From Date (Start Date)</label>
                                            <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}" >
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>To Date (End Date)</label>
                                            <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}" >
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                    style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/manager') }}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manager List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Manager Name</td>
                                        <td>Manager Email</td>
                                        <td>Manager Mobile</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->manager_name }}</td>
                                            <td>{{ $value->manager_email }}</td>
                                            <td>{{ $value->manager_mobile }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/manager/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/manager/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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
