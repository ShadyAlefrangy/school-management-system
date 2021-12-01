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
                <h3 class="box-title">Employees List</h3>
                <a href="{{ route('employee.registration.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Employee</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th>ID NO.</th>
                              <th>Mobile</th>
                              <th>Gender</th>
                              <th>Salary</th>
                              <th>Join Date</th>
                              @if (Auth::user()->role == "Admin")
                              <th>Code</th>
                              @endif
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($employees as $key => $employee)
                           
                       
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->id_number }}</td>
                            <td>{{ $employee->mobile }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->join_date }}</td>
                            @if (Auth::user()->role == "Admin")
                                <td>{{ $employee->code }}</td>
                            @endif

                            <td>
                              <a href="{{ route('employee.registration.edit', $employee->id) }}" class="btn btn-info mb-5">Edit</a>
                              <a target="_blank" href="{{ route('employee.registration.details', $employee->id) }}" class="btn btn-danger mb-5" id="details">Details</a>  
                            </td>
                              
                        </tr>
                      @endforeach     
                      </tbody>
                      <tfoot>
                          <tr>
                            <th width="5%">SL</th>
                            <th>Name</th>
                            <th>ID NO.</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Salary</th>
                            <th>Join Date</th>
                            @if (Auth::user()->role == "Admin")
                            <th>Code</th>
                            @endif
                            <th width="25%">Action</th>
                              
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