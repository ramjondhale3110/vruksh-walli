   @extends('layouts.app')
    @section('content')
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
                    <th class="widthcls">Brand Name</th>
                    <th class="widthcls">Brand Logo</th>
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
                          ajax:"{{ url('admin/brand/alldatatable') }}",

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"brand_id"
                          },{
                            "mData":"brand_name"
                          },{
                            "targets":-1,
                            "mData": "brand_logo",
                            "bSortable": false,
                            "filter":false,
                            mRender: function(data, type, row) {      
                            return "<img src=" + row.brand_logo +" height=\"50\"/>";         
                             console.log("sedfgyuhj");
                            }
                          }, 
                          {
                            "mData" : "brand_id",
                            "mRender" : function(data, type, row){
                              return "<a href='{{url('admin/brand/update')}}/"+row.brand_id+"''><i class='fas fa-edit' style='font-size:24px;'></i></a>";
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