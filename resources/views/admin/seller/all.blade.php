   @extends('layouts.app')
   @section('content')
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <style type="text/css">
      .widthcls{
        width:497px!important;
      }
    </style>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Brand</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="widthcls">Id</th>
                    <th class="widthcls">First Name</th>
                    <th class="widthcls">Last Name</th>
                    <th class="widthcls">Email</th>
                    <th class="widthcls">Contact No.</th>
                    <th class="widthcls">Shop Name</th>
                    <th class="widthcls">Shop Address</th>
                    <th class="widthcls">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                    <script>
                      $(document).ready(function(){
                        $("#example1").DataTable({
                          "scrollX": true,
                          "processing": true,
                          "serverSide": true,
                          "responsive": true,
                          ajax:"{{ url('sellers/alldatatable') }}",

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"seller_id"
                          },
                          {
                            "mData":"seller_first_name"
                          },
                          {
                            "mData":"seller_last_name"
                          },
                          {
                            "mData":"seller_email"
                          },
                          {
                            "mData":"seller_contact_no"
                          },
                          {
                            "mData":"seller_shop_name"
                          },
                          {
                            "mData":"seller_address"
                          },{
                            "mData" : "category_id",
                            "mRender" : function(data, type, row){
                              return "<a href='{{url('category/update')}}/"+row.category_id+"''><i class='fas fa-edit' style='font-size:24px;'></i></a>";
                            }
                          },     
                        ]

                        });
                      });
                    </script>       
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </div>
</div>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection