@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Pay Roll</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/payroll_export') }}" class="btn btn-success">Excel Export</a>
{{--                        <form action="{{ url('admin/payroll_export') }}" method="get">--}}
{{--                            <input type="hidden" name="start_date" value="{{ Request()->start_date }}">--}}
{{--                            <input type="hidden" name="end_date" value="{{ Request()->end_date }}">--}}
{{--                            <a href="{{ url('admin/payroll_export?start_date='.Request::get('start_date').'&end_date='.Request::get('end_date')) }}" class="btn btn-success">Excel Export</a>--}}
{{--                        </form>--}}
{{--                        <br />--}}
                        <a href="{{ url('admin/payroll/add') }}" class="btn btn-primary">Add Pay Roll</a>
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
                                <h3 class="card-title">Search Pay Roll List</h3>
                            </div>

                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-1">
                                            <label>ID</label>
                                            <input type="text" name="id" class="form-control" value="{{ Request()->id }}" placeholder="ID">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Employee Name</label>
                                            <input type="text" name="employee_id" class="form-control" value="{{ Request()->employee_id }}" placeholder="Employee Name ">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Number Of Day Work</label>
                                            <input type="text" name="number_of_day_work" class="form-control" value="{{ Request()->number_of_day_work }}" placeholder="Enter Number Of Day Work ">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Bonus</label>
                                            <input type="text" name="bonus" class="form-control" value="{{ Request()->bonus }}" placeholder="Enter Bonus ">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Overtime</label>
                                            <input type="text" name="overtime" class="form-control" value="{{ Request()->overtime }}" placeholder="Enter Overtime ">
                                        </div>

{{--                                        <div class="form-group col-md-3">--}}
{{--                                            <label>Start Date</label>--}}
{{--                                            <input type="date" name="start_date" class="form-control" value="{{ Request()->start_date }}" >--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group col-md-3">--}}
{{--                                            <label>End Date</label>--}}
{{--                                            <input type="date" name="end_date" class="form-control" value="{{ Request()->end_date }}" >--}}
{{--                                        </div>--}}

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/payroll') }}" class="btn btn-success" style="margin-top: 30px;">Reset</a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                        @include('_message')

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pay Roll List</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Number Of Day Work</th>
                                        <th>Bonus</th>
                                        <th>Overtime</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $total_number_of_day_work = 0;
                                        $totalBonus = 0;
                                        $totalOvertime = 0;
                                    @endphp
                                        @forelse($getRecord as $value)
                                            @php
                                                $total_number_of_day_work = $total_number_of_day_work + $value->number_of_day_work;
                                                $totalBonus = $totalBonus + $value->bonus;
                                                $totalOvertime = $totalOvertime + $value->overtime;
                                            @endphp
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ !empty($value->name) ? $value->name : '' }}</td>
                                                <td>{{ $value->number_of_day_work }}</td>
                                                <td>{{ $value->bonus }}</td>
                                                <td>{{ $value->overtime }}</td>
                                                <td>
                                                    <a href="{{ url('admin/payroll/view/'.$value->id) }}" class="btn btn-info">View</a>
                                                    <a href="{{ url('admin/payroll/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/payroll/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">No Record Found.</td>
                                            </tr>
                                        @endforelse
                                    <tr>
                                        <th colspan="2">Total All</th>
                                        <td>
                                            {{ $total_number_of_day_work }}
                                        </td>
                                        <td>
                                            {{ $totalBonus }}
                                        </td>
                                        <td>
                                            {{ $totalOvertime }}
                                        </td>
                                        <th colspan="1"></th>
                                    </tr>
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
