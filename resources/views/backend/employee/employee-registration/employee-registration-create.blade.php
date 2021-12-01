@extends('admin.admin-master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
       <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Create Employee</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('employee.registration.store') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- The first row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Employee Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="father_name" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mother_name" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the first row --}}

                            {{-- The second row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mobile Number <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="role" required class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the second row --}}

                            {{-- The third row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Designation <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="designation_id" id="role" required class="form-control">
                                                <option value="">Select Designation</option>
                                                @foreach ($desgnations as $desgnation)
                                                    <option value="{{ $desgnation->id }}">{{ $desgnation->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date_of_birth" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="religion" id="role" required class="form-control">
                                                <option value="">Select Religion</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Christian">Christian</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the third row --}}

                            {{-- The fourth row --}}
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Salary <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="salary" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Joined Date <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="join_date" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" id="image"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="height: 100px; width:100px; border: 1px solid black;"> 
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the fourth row --}}
                            
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Create</button>
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

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection


