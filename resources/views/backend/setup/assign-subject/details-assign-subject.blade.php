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
                <h3 class="box-title">Assigned Subjects Details</h3>
                <a href="{{ route('assign.subject.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Assign New Subject</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>Class Name:</strong> {{ $assignSubjects[0]->student_class->name }}</h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Subject Name</th>
                              <th width="20%">Full Mark</th>
                              <th width="20%">Pass Mark</th>
                              <th width="20%">Subjective Mark</th>
                            
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($assignSubjects as $key => $assignSubject)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $assignSubject->school_subject->name }}</td>
                            <td>{{ $assignSubject->full_mark }}</td>
                            <td>{{ $assignSubject->pass_mark }}</td>
                            <td>{{ $assignSubject->subjective_mark }}</td>
                        </tr>
                      @endforeach     
                      </tbody>
                      <tfoot>
                          <tr>
                            <th width="5%">SL</th>
                              <th>Subject Name</th>
                              <th width="20%">Full Mark</th>
                              <th width="20%">Pass Mark</th>
                              <th width="20%">Subjective Mark</th>
                              
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