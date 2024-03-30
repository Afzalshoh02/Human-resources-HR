@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">View PayRoll</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">View</a></li>
                            <li class="breadcrumb-item active">PayRoll</li>
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
                                <h3 class="card-title">Add Payroll</h3>
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
                                        <label class="col-sm-2 col-form-label">Employees Name <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->get_employee_name->name) ? $getRecord->get_employee_name->name : '' }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Number Of Day Work <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->number_of_day_work }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bonus <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->bonus }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Overtime <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->overtime }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Gross Salary <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->gross_salary }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Cash Advance <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->cash_advance }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Late Hours <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ ($getRecord->late_hours) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Absent Days <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->absent_days }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">SSS Contribution <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->sss_contribution }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Philhealth <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->philhealth) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Total deduction <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->total_deduction) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Net Pay <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->netpay }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Payroll Monthly <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->payroll_monthly }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Created At <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->created_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Updated At <span style="color: red;"> </span></label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i A', strtotime($getRecord->updated_at)) }}
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/payroll') }}" class="btn btn-default">Back</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
