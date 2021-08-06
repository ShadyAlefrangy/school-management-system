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
                <h3 class="box-title">List Designation</h3>
                <a href="{{ route('designation.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Designation</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Name</th>
                              <th width="25%">Action</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($designations as $key => $designation)
                           
                       
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $designation->name }}</td>
                            <td>
                              <a href="{{ route('designation.edit', $designation->id) }}" class="btn btn-info mb-5">Edit</a>
                              <a href="{{ route('designation.delete', $designation->id) }}" class="btn btn-danger mb-5" id="delete">Delete</a>  
                            </td>
                              
                        </tr>
                      @endforeach     
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>SL</th>
                            <th>Name</th>
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