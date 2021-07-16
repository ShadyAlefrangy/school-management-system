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
                <h4 class="box-title">Edit User</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('user.update', $user->id) }}">
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
                                        <h5>User Type <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="usertype" id="select" required class="form-control">
                                                <option value="">Select User Type</option>
                                                <option value="Admin" {{ ($user->usertype) == 'Admin' ? "selected" : "" }}>Admin</option>
                                                <option value="User" {{ ($user->usertype) == 'User' ? "selected" : "" }}>User</option>
                                            </select>
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
@endsection


