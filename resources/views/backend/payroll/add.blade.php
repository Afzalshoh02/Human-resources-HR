@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pay Roll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Add</a></li>
                            <li class="breadcrumb-item active">Pay Roll</li>
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
                                <h3 class="card-title">Add Pay Roll</h3>
                            </div>
                            <form class="form-horizontal" method="post" action="{{ url('admin/payroll/add') }}"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Employees Name <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="employee_id">
                                                <option value="">Select Employees Name</option>
                                                 @foreach($getEmployee as $value_employees)
                                                 <option value="{{ $value_employees->id }}">{{ $value_employees->name }}</option>
                                                 @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Number Of Day Work <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('number_of_day_work') }}" name="number_of_day_work" class="form-control" placeholder="Enter Number Of Day Work">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bonus <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('bonus') }}" name="bonus" class="form-control" placeholder="Enter Bonus">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Overtime <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('overtime') }}" name="overtime" class="form-control" placeholder="Enter Overtime">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gross Salary <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('gross_salary') }}" name="gross_salary" class="form-control" placeholder="Enter Gross Salary">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cash Advance <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('cash_advance') }}" name="cash_advance" class="form-control" placeholder="Enter Cash Advance">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Late Hours <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('late_hours') }}" name="late_hours" class="form-control" placeholder="Enter Late Hours">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Absent Days <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('absent_days') }}" name="absent_days" class="form-control" placeholder="Enter Absent Days">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SSS Contribution <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('sss_contribution') }}" name="sss_contribution" class="form-control" placeholder="Enter SSS Contribution">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Philhealth <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('philhealth') }}" name="philhealth" class="form-control" placeholder="Enter Philhealth">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total deduction <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('total_deduction') }}" name="total_deduction" class="form-control" placeholder="Enter Total deduction">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Net Pay <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('netpay') }}" name="netpay" class="form-control" placeholder="Enter Net Pay">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payroll Monthly <span style="color: red;"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('payroll_monthly') }}" name="payroll_monthly" class="form-control" placeholder="Enter Payroll Monthly">
                                        </div>
                                    </div>


{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-2 col-form-label">Start Date <span--}}
{{--                                                style="color: red;"> *</span></label>--}}
{{--                                        <div class="col-sm-10">--}}
{{--                                            <input type="date" value="{{ old('start_date') }}" name="start_date"--}}
{{--                                                   class="form-control" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-sm-2 col-form-label">End Date <span--}}
{{--                                                style="color: red;"> *</span></label>--}}
{{--                                        <div class="col-sm-10">--}}
{{--                                            <input type="date" value="{{ old('end_date') }}" name="end_date"--}}
{{--                                                   class="form-control" required>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
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
