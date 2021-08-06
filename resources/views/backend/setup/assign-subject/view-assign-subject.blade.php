@extends('admin.admin-master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        
      
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
 

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">List Assigned Subjects</h3>
                <a href="{{ route('assign.subject.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Assign Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Class Name</th>
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($assignSubjects as $key => $assignSubject)
                           
                       
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $assignSubject->student_class->name }}</td>
                            <td>
                              <a href="{{ route('assign.subject.edit', $assignSubject->class_id) }}" class="btn btn-info mb-5">Edit</a>
                              <a href="{{ route('assign.subject.details', $assignSubject->class_id) }}" class="btn btn-warning mb-5">Details</a>
                            </td>
                              
                        </tr>
                      @endforeach     
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>SL</th>
                            <th>Class Name</th>
                            <th>Action</th>
                              
                          </tr>
                      </tfoot>
                    </table>
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