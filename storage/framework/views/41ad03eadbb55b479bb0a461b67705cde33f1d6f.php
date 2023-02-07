   
    <?php $__env->startSection('content'); ?>
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
                    <th class="widthcls">Prod Name</th>
                    <th class="widthcls">Prod Color</th>
                    <th class="widthcls">Prod Price</th>
                    <th class="widthcls">Unit Price</th>
                    <th class="widthcls">Prod Tax</th>
                    <th class="widthcls">Prod Disc</th>
                    <th class="widthcls">Disc Type</th>
                    <th class="widthcls">Prod Qty</th>
                    <th class="widthcls">Prod Code</th>
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
                          ajax:"<?php echo e(url('admin/product/alldatatable')); ?>",

                          "order":[
                          [0,"asc"]
                          ],
                          "columns":[
                          {
                            "mData":"product_id"
                          },{
                            "mData":"product_name"
                          },{
                            "mData":"product_colour"
                          },{
                            "mData":"product_purchase_price"
                          },{
                            "mData":"product_unit_price"
                          },{
                            "mData":"product_tax"
                          },{
                            "mData":"product_discount"
                          },{
                            "mData":"disc_type"
                          },{
                            "mData":"product_qty"
                          },{
                            "mData":"product_code"
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravelproject\resources\views/admin/product/all.blade.php ENDPATH**/ ?>