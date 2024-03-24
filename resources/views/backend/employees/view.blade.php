@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View Employees</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
                            <li class="breadcrumb-item active">Employees</li>
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
                                <h3 class="card-title">Add Employees</h3>
                            </div>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">First Name <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->last_name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email ID <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->email }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->phone_number }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hire Date <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y', strtotime($getRecord->hire_date)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Job ID <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->job_id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Salary <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->salary }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Commission PCT <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->commission_pct }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Manager Name <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->manager_id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Department Name <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->department_id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Created Date <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Update Date <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">IS Role <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->is_role) ? "HR" : "Employees" }}
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-default">Back</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
