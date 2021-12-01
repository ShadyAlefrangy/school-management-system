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
                <h3 class="box-title">Employee Salary Details</h3>
                <br><br>
                <h5><strong>Employee Name</strong> {{ $employee->name }}</h5>
                <h5><strong>Employee ID NO.</strong> {{ $employee->id_number }}</h5>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Previous Salary</th>
                              <th>Increment Salary</th>
                              <th>Present Salary</th>
                              <th>Effected Date</th>
                                                           
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($salary_logs as $key => $salary_log)
                           
                       
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $salary_log->previous_salary }}</td>
                            <td>{{ $salary_log->increment_salary }}</td>
                            <td>{{ $salary_log->present_salary }}</td>
                            <td>{{ date('d-m-Y', strtotime($salary_log->effected_salary)) }}</td>
                        </tr>
                      @endforeach     
                      </tbody>
                      <tfoot>
                          <tr>
                            <th width="5%">SL</th>
                              <th>Previous Salary</th>
                              <th>Increment Salary</th>
                              <th>Present Salary</th>
                              <th>Effected Date</th>
                              
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