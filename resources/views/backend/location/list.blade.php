@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>locations</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">

                        <form action="{{ url('admin/location_export') }}" method="get">
                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">
                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">

                            <a class="btn btn-success" href="{{ url('admin/location_export?start_date='.Request::get('start_date').'&end_date=').Request::get('end_date') }}">Excel Export</a>
                        </form>
                        <br>
                        <a href="{{ url('admin/location/add') }}" class="btn btn-primary">Add locations</a>
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
                                <h3 class="card-title">Search Locations</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Street Address</label>
                                            <input type="text" name="street_address" class="form-control" value="{{ Request()->street_address }}" placeholder="Enter Street Address">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Postal Code</label>
                                            <input type="text" name="postal_code" class="form-control" value="{{ Request()->postal_code }}" placeholder="Enter Postal Code">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" value="{{ Request()->city }}" placeholder="Enter City Ҷ">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>State Provice</label>
                                            <input type="text" name="state_provice" class="form-control" value="{{ Request()->state_provice }}" placeholder="Enter State Provice">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Countries Name</label>
                                            <input type="text" name="country_name" class="form-control" value="{{ Request()->country_name }}" placeholder="Enter Countries Name">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Created At</label>
                                            <input type="date" name="created_at" class="form-control" value="{{ Request()->created_at }}" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Updated AT</label>
                                            <input type="date" name="updated_at" class="form-control" value="{{ Request()->updated_at }}" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>From Date (Start Date)</label>
                                            <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>To Date (End Date)</label>
                                            <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}" >
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                    style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/location') }}" class="btn btn-success"
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
                                        <td>Street Address</td>
                                        <td>Postal Code</td>
                                        <td>City</td>
                                        <td>State Provice</td>
                                        <td>Countries Name</td>
                                        <td>Created At</td>
                                        <td>Updated At</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse($getRecord as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->street_address }}</td>
                                            <td>{{ $value->postal_code }}</td>
                                            <td>{{ $value->city }}</td>
                                            <td>{{ $value->state_provice }}</td>
                                            <td> {{ $value->country_name }} / {{ $value->countries_id }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/location/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ url('admin/location/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
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
