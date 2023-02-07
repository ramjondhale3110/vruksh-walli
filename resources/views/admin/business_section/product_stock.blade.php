   @extends('layouts.app')
    @section('content')
    <style type="text/css">
      .widthcls{
        width:497px!important;
      }
    </style>
<br><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                     <h3 class="card-title">All Brand</h3>
                  </div>
                  <div class="col-md-3">    
                   <label>Saller</label>
                   <select class="form-control select2" name="category_id" id="category_id" onchange="find()">
                    <option value="">--Select--</option>
                    @foreach($seller as $sal)
                    <option value="{{$sal->id}}">{{$sal->seller_first_name}}</option>
                    @endforeach
                  </select>
                </div>
            <!--     <div class="col-md-6">
                     <h3 class="card-title">All Brand</h3>
                  </div> -->
                </div>
                <!-- <h3 class="card-title">All Brand</h3> -->
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="widthcls">Id</th>
                    <th class="widthcls">Prod Name</th>
                    <th class="widthcls">Prod Qty</th>
                    <th class="widthcls">Date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                    <script>
                      function find(){
                        table = $('#example1').DataTable();
                        table.destroy();
                        postdataTable();
                      }

                      $(document).ready(function(){
                        postdataTable();
                        var category_id = "";
                        
                      });

                      function postdataTable(){
                        var category_id = $('#category_id').val();
                        $("#example1").DataTable({
                          "scrollX": true,
                          "processing": true,
                          "serverSide": true,
                          "responsive": true,
                          ajax:"{{ url('admin/product_stock/alldatatable')}}?category_id="+category_id,

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"product_id"
                          },{
                            "mData":"product_name"
                          },{
                            "mData":"product_qty"
                          },{
                            "mData":"created_at"
                          },
                        ]

                        });
                       
                      }
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