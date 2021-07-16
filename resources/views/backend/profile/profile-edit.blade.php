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
                <h4 class="box-title">Edit Profile</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">						
                                    <div class="form-group">
                                        <h5>User Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">						
                                    <div class="form-group">
                                        <h5>User Mobile <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" value="{{ $user->address }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>User Gender <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="gender" id="select" required class="form-control">
                                                <option value="">Select User Type</option>
                                                <option value="Male" {{ ($user->gender) == 'Male' ? "selected" : "" }}>Male</option>
                                                <option value="Female" {{ ($user->gender) == 'Female' ? "selected" : "" }}>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Profile Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" class="form-control" id="image"> 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" src="{{ (!empty($user->image)) ? url('upload/user-images/'.$user->image) : url('upload/no_image.jpg') }}" style="height: 100px; width:100px; border: 1px solid black;"> 
                                        </div>
                                    </div>

                                </div>

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


