@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Location</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Location</li>
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
                                <h3 class="card-title">Add Location</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/location/add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Street Address <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('street_address') }}" name="street_address" class="form-control" required placeholder="Enter Street Address">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Postal Code <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('postal_code') }}" name="postal_code" class="form-control" required placeholder="Enter Postal Code">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">City <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('city') }}" name="city" class="form-control" required placeholder="Enter City">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">State Provice <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('state_provice') }}" name="state_provice" class="form-control" required placeholder="Enter State Provice">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Countries Name (Countries ID) <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="countries_id" required>
                                                <option value="">Select Countries Name </option>
                                                @foreach($getCountries as $countries)
                                                    <option value="{{ $countries->id }}">{{ $countries->country_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/location') }}" class="btn btn-default">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
