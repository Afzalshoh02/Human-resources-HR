@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Job Grades</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">

{{--                        <form action="{{ url('admin/job_grades_export') }}" method="get">--}}
{{--                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">--}}
{{--                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">--}}
{{--                            <a href="{{ url('admin/job_history_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}" class="btn btn-success">Excel Export</a>--}}
{{--                        </form>--}}
{{--                        <br />--}}
                        <a href="{{ url('admin/job_grades/add') }}" class="btn btn-primary">Add Job Grades</a>
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
                                <h3 class="card-title">Search Job Grades</h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-1">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Grade Level</label>
                                            <input type="text" name="grade_level" class="form-control" value="{{ Request()->grade_level }}" placeholder="Grade Level">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Lowest Sal</label>
                                            <input type="number" name="lowest_sal" class="form-control" value="{{ Request()->lowest_sal }}" placeholder="Lowest Sal">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Highest Sal</label>
                                            <input type="number" name="highest_sal" class="form-control" value="{{ Request()->highest_sal }}" placeholder="Highest Sal">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Created At</label>
                                            <input type="date" name="created_at" class="form-control" value="{{ Request()->created_at }}" placeholder="Created At">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Updated At</label>
                                            <input type="date" name="updated_at" class="form-control" value="{{ Request()->updated_at }}" placeholder="Updated At">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/job_grades') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jobs Grades List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Grade Level</th>
                                        <th>Lowest Sal</th>
                                        <th>Highest Sal</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->grade_level }}</td>
                                                <td>{{ $value->lowest_sal }}</td>
                                                <td>{{ $value->highest_sal }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                                                <td>{{ date('d-m-Y H:i A', strtotime($value->updated_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/job_grades/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/job_grades/delete/'.$value->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}
                        </div>
                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
