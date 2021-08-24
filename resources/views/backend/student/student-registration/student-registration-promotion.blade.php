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
                <h4 class="box-title">Student Promotion</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('student.registration.promotion.update', $student->student_id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            {{-- The first row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Student Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->student->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Father's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="father_name" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->student->father_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Mother's Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mother_name" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->student->mother_name }}">
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
                                            <input type="text" name="mobile" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->student->mobile }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->student->address }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="role" required class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{ $student->student->gender == 'Male' ? "selected" : "" }}>Male</option>
                                                <option value="Female" {{ $student->student->gender == 'Female' ? "selected" : "" }}>Female</option>
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
                                        <h5>Discount <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->discount->discount }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Date Of Birth <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="date" name="date_of_birth" class="form-control" required data-validation-required-message="This field is required" value="{{ $student->student->date_of_birth }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Religion <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="religion" id="role" required class="form-control">
                                                <option value="">Select Religion</option>
                                                <option value="Islam" {{ $student->student->religion == 'Islam' ? "selected" : "" }}>Islam</option>
                                                <option value="Hindu" {{ $student->student->religion == 'Hindu' ? "selected" : "" }}>Hindu</option>
                                                <option value="Christian" {{ $student->student->religion == 'Christian' ? "selected" : "" }}>Christian</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the third row --}}

                            {{-- The fourth row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="role" required class="form-control">
                                                <option value="">Select Class</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}" {{ $student->class_id == $class->id ? "selected" : "" }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Year <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="year_id" id="role" required class="form-control">
                                                <option value="">Select Year</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}" {{ $student->year_id == $year->id ? "selected" : "" }}>{{ $year->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Group <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="group_id" id="role" required class="form-control">
                                                <option value="">Select Group</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{ $group->id }}" {{ $student->group_id == $group->id ? "selected" : "" }}>{{ $group->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the fourth row --}}

                            {{-- The fifth row --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Shift <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="shift_id" id="role" required class="form-control">
                                                <option value="">Select Shift</option>
                                                @foreach ($shifts as $shift)
                                                    <option value="{{ $shift->id }}" {{ $student->shift_id == $shift->id ? "selected" : "" }}>{{ $shift->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" id="image"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" src="{{ (!empty($student->student->image)) ? url('upload/students_images/'.$student->student->image) : url('upload/no_image.jpg') }}" style="height: 100px; width:100px; border: 1px solid black;">
                                            {{-- <img id="showImage" src="{{ url('upload/no_image.jpg') }}" style="height: 100px; width:100px; border: 1px solid black;">  --}}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- End the fifth row --}}
                            
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Promotion</button>
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


