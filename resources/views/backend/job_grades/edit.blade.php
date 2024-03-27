@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Job Grades</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">Job Grades</li>
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
                                <h3 class="card-title">Edit Grades</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/job_grades/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Grade Level <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ $getRecord->grade_level }}" name="grade_level" class="form-control" required placeholder="Enter Grade Label">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Lowest Sal <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->lowest_sal }}" name="lowest_sal" class="form-control" required placeholder="Enter Lowest Sal">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Highest Sal <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ $getRecord->highest_sal }}" name="highest_sal" class="form-control" required placeholder="Enter Highest Sal">
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/job_grades') }}" class="btn btn-default">Back</a>
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
