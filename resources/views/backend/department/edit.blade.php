@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Department</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Department</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Department</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/department/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Department Name <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->department_name }}" name="department_name" class="form-control" required placeholder="Enter Department Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name (Manager Id) <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="manager_id" required>
                                                <option value="">Select Manager Name </option>
                                                {{--@foreach($getCountries as $countries)--}}
                                                <option {{ ($getRecord->manager_id == 1) ? 'selected' : '' }} value="1">Vipul</option>
                                                <option {{ ($getRecord->manager_id == 2) ? 'selected' : '' }} value="2">Dio</option>
                                                {{--@endforeach--}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Locations Name (Locations Id) <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="locations_id" required>
                                                <option value="">Select Locations Name </option>
                                                @foreach($getLocation as $value)
                                                    <option {{ ($value->id == $getRecord->locations_id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->street_address }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/department') }}" class="btn btn-default">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
