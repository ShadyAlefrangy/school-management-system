@extends('admin.admin-master')
@section('admin')
 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
       <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Employee Salary Increment</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('employee.salary.increment.store', $employee->id) }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Salary Amount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="increment_salary" class="form-control" required data-validation-required-message="This field is required"> </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Effected Salary Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="effected_salary" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>

                </div>
                <!-- /.col -->

            </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
</div>
@endsection


