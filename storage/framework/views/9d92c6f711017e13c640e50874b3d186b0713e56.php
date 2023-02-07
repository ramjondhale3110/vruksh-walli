   
   <?php $__env->startSection('content'); ?>
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
                    <th class="widthcls">Category Name</th>
                    <th class="widthcls">Priority No</th>
                    <th class="widthcls">category Image</th>
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
                          ajax:"<?php echo e(url('admin/cat/alldatatable')); ?>",

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"category_id"
                          },
                          {
                            "mData":"category_name"
                          },
                          {
                            "mData":"priority_no"
                          },{
                            "targets":-1,
                            "mData": "category_img",
                            "bSortable": false,
                            "filter":false,
                            mRender: function(data, type, row) {      
                            return "<img src=" + row.category_img +" height=\"50\"/>";         
                             console.log("sedfgyuhj");
                            }
                          }, {
                            "mData" : "category_id",
                            "mRender" : function(data, type, row){
                              return "<a href='<?php echo e(url('admin/category/update')); ?>/"+row.category_id+"''><i class='fas fa-edit' style='font-size:24px;'></i></a>";
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/admin/category/all.blade.php ENDPATH**/ ?>