@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Manager</li>
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
                                <h3 class="card-title">Edit Manager</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/manager/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->manager_name }}" name="manager_name" class="form-control" required placeholder="Enter Manager Name">
                                            <span style="color: red;">{{ $errors->first('manager_name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Email <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" value="{{ $getRecord->manager_email }}" name="manager_email" class="form-control" required placeholder="Enter Manager Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Mobile <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->manager_mobile }}" name="manager_mobile" class="form-control" required placeholder="Enter Manager Mobile">
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/manager') }}" class="btn btn-default">Back</a>
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
