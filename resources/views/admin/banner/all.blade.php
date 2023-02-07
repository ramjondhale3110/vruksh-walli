   @extends('layouts.app')
   @section('content')
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style type="text/css">
      .widthcls{
        width:490px!important;
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
                    <th class="widthcls">Banner Type</th>
                    <th class="widthcls">Banner Type</th>
                    <th class="widthcls">Banner Product</th>
                    <th class="widthcls">banner_image</th>
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
                          ajax:"{{ url('banner/alldatatable') }}",

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"banner_id"
                          },{
                            "mData":"banner_type"
                          },{
                            "mData":"resource_type"
                          },{
                            "mData":"resource_type"
                          },{
                            "targets":-1,
                            "mData": "banner_image",
                            "bSortable": false,
                            "filter":false,
                            mRender: function(data, type, row) {      
                            return "<img src=" + row.banner_image +" height=\"50\"/>";         
                            }
                          },{
                            "mData" : "banner_id",
                            "mRender" : function(data, type, row){
                              return "<a href='{{url('banner/update')}}/"+row.banner_id+"''><i class='fas fa-edit' style='font-size:24px;'></i></a>";
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