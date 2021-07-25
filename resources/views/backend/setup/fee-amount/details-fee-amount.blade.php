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
                <h3 class="box-title">Fee Amount Details</h3>
                <a href="{{ route('fee.amount.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>Fee Category:</strong> {{ $feeAmounts[0]->fee_category->name }}</h4>
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="5%">SL</th>
                              <th>Class Name</th>
                              <th width="25%">Amount</th>
                              
                          </tr>
                      </thead>
                      <tbody>
                       @foreach ($feeAmounts as $key => $feeAmount)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $feeAmount->student_class->name }}</td>
                            <td>{{ $feeAmount->amount }}</td>
                        </tr>
                      @endforeach     
                      </tbody>
                      <tfoot>
                          <tr>
                            <th>SL</th>
                            <th>Class Name</th>
                            <th>Amount</th>
                              
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