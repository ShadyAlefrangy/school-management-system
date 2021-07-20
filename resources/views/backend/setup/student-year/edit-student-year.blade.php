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
                <h4 class="box-title">Edit Student Year</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('student.year.update', $studentYear->id) }}">
                            @csrf
                            <div class="form-group">
                                <h5>Student Year Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" value="{{ $studentYear->name }}" class="form-control" required data-validation-required-message="This field is required"> </div>
                            </div>
                            
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Update</button>
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


