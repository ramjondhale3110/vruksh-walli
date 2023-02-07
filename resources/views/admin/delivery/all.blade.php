   @extends('layouts.app')
    @section('content')
    <style type="text/css">
      .widthcls{
        width:497px!important;
      }
    </style>
    <br>
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
                    <th class="widthcls">Name</th>
                    <th class="widthcls">Cont no.</th>
                    <th class="widthcls">Identity Type</th>
                    <th class="widthcls">Identity No</th>
                 <!--    <th class="widthcls">Identity Image</th> -->
                   <!--  <th class="widthcls">photo</th> -->
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
                          ajax:"{{ url('admin/delivery/alldatatable') }}",

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"delivery_men_id"
                          },{
                            "mData":"full_name"
                          },{
                            "mData":"deliveryman_phone"
                          },{
                            "mData":"deliveryman_identity_type"
                          },{
                            "mData":"deliveryman_identity_no"
                          },/*{
                            "targets":-1,
                            "mData": "deliveryman_identity_img",
                            "bSortable": false,
                            "filter":false,
                            mRender: function(data, type, row) {      
                            return "<img src=" + row.deliveryman_identity_img +" height=\"50\"/>";
                            }
                          },*/
                          {
                            "mData" : "delivery_id",
                            "mRender" : function(data, type, row){
                              return "<a href='{{url('admin/delivery/update')}}/"+row.delivery_men_id +"''><i class='fas fa-edit' style='font-size:24px;'></i></a>";
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