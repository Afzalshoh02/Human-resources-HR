@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jobs</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/jobs/add') }}" class="btn btn-primary">Add Jobs</a>
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
                                <h3 class="card-title">Search Jobs</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-sm-1">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Job Title</label>
                                            <input type="text" name="job_title" class="form-control" value="{{ Request()->job_title }}" placeholder="Job Title">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Min Salary</label>
                                            <input type="text" name="min_salary" class="form-control" value="{{ Request()->min_salary }}" placeholder="Min Salary">
                                        </div>

                                        <div class="form-group col-sm-3">
                                            <label>Max Salary</label>
                                            <input type="text" name="max_salary" class="form-control" value="{{ Request()->max_salary }}" placeholder="Max Salary">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit"
                                                    style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/jobs') }}" class="btn btn-success"
                                               style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jobs List</h3>
                            </div>

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Job Title</td>
                                        <td>Min Salary</td>
                                        <td>Max Salary</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td>Title</td>
                                            <td>Title</td>
                                            <td>200</td>
                                            <td>300</td>
                                            <td>2024</td>
                                            <td>
                                                <a href="" class="btn btn-info">View</a>
                                                <a href="" class="btn btn-primary">Edit</a>
                                                <a href="" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="100%">No Record Found.</td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div style="padding: 10px; float: right">
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>
        </section>

    </div>
@endsection
