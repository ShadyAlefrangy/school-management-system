@extends('admin.admin-master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box bb-3 border-warning">
              <div class="box-header">
              <h4 class="box-title">Student <strong>Search</strong></h4>
              </div>
              <div class="box-body">
                <form method="GET" action=" {{ route('student.year.class.wise') }} ">
                  @csrf
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <h5>Year <span class="text-danger">*</span></h5>
                          <div class="controls">
                              <select name="year_id" id="role" required class="form-control">
                                  <option value="">Select Year</option>
                                  @foreach ($years as $year)
                                      <option value="{{ $year->id }}" {{ ($year_id == $year->id) ? "selected": "" }}>{{ $year->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  

                  <div class="col-md-4">
                    <div class="form-group">
                        <h5>Class <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="class_id" id="role" required class="form-control">
                                <option value="">Select Class</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ ($class_id == $class->id) ? "selected": "" }}>{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <input type="submit" value="Search" name="search" class="btn btn-rounded btn-dark" style="margin-top: 25px;">
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>  
 

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">List Student</h3>
                <a href="{{ route('student.registration.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    @if (!@search)
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Name</th>
                                <th>ID No</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Image</th>
                                @if(Auth::user()->role == 'Admin')
                                  <th>Code</th>
                                @endif
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $key => $student)

                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $student->student->name }}</td>
                              <td>{{ $student->student->id_number }}</td>
                              <td>{{ $student->roll }}</td>
                              <td>{{ $student->student_class->name }}</td>
                              <td>{{ $student->student_year->name }}</td>
                              <td>
                                <img id="showImage" src="{{ (!empty($student->student->image)) ? url('upload/students_images/'.$student->student->image) : url('upload/no_image.jpg') }}" style="height: 60px; width:60px;">
                              </td>
                              <td>{{ $student->student->code }}</td>
                              <td>
                                <a href="{{ route('student.registration.edit', $student->student_id) }}" class="btn btn-info mb-5">Edit</a>
                                <a href="{{ route('student.registration.promotion', $student->student_id) }}" class="btn btn-warning mb-5">Promotion</a>
                              </td>
                                
                          </tr>
                        @endforeach     
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Name</th>
                                <th>ID No</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Image</th>
                                @if(Auth::user()->role == 'Admin')
                                  <th>Code</th>
                                @endif
                                <th width="25%">Action</th>
                            </tr>
                        </tfoot>
                      </table>  
                    @else
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Name</th>
                                <th>ID No</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Image</th>
                                @if(Auth::user()->role == 'Admin')
                                  <th>Code</th>
                                @endif
                                <th width="25%">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $key => $student)

                          <tr>
                              <td>{{ $key+1 }}</td>
                              <td>{{ $student->student->name }}</td>
                              <td>{{ $student->student->id_number }}</td>
                              <td>{{ $student->roll }}</td>
                              <td>{{ $student->student_class->name }}</td>
                              <td>{{ $student->student_year->name }}</td>
                              <td>
                                <img id="showImage" src="{{ (!empty($student->student->image)) ? url('upload/students_images/'.$student->student->image) : url('upload/no_image.jpg') }}" style="height: 60px; width:60px;">
                              </td>
                              <td>{{ $student->student->code }}</td>
                              <td>
                                <a href="{{ route('student.registration.edit', $student->student_id) }}" class="btn btn-info mb-5">Edit</a>
                                <a href="{{ route('student.registration.promotion', $student->student_id) }}" class="btn btn-warning mb-5">Promotion</a>
                              </td>
                                
                          </tr>
                        @endforeach     
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Name</th>
                                <th>ID No</th>
                                <th>Roll</th>
                                <th>Year</th>
                                <th>Class</th>
                                <th>Image</th>
                                @if(Auth::user()->role == 'Admin')
                                  <th>Code</th>
                                @endif
                                <th width="25%">Action</th>
                            </tr>
                        </tfoot>
                      </table>
                    @endif 
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
         
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>
@endsection