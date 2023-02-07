@extends('layouts.app')
@section('content')
<!-- Select2 -->

<!-- Theme style -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <style type="text/css">
   .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 26px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 19px;
  width: 19px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
 </style>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
      </div>
    </div><!-- /.container-fluid -->
  </section>
    <form action="{{route('product.update',$product->product_id)}}" method="post" enctype="multipart/form-data">
      @method('put')
      @csrf
     <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Name</h3>

     
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Name</label>
                   <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">General Info</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select2" name="category_id" id="category_id" onchange="getSubcategory(this.value);" style="width: 100%;">
                    <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                    @foreach($category as $cat)
                    <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('category_id'))
                  <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                  </span>
                  @endif   
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Sub Category</label>
                  <select class="form-control select2" id="sub_category_id" name="sub_category_id" style="width: 100%;">
                    <option value="">Select Sub Category</option>
                  </select>
                  @if ($errors->has('sub_category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sub_category_id') }}</strong>
                    </span>
                    @endif 
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Product code sku * Generate Code</label>
                  <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}">
                </div>
              </div>     
              <div class="col-md-4">
                <div class="form-group">
                  <label>Brand</label>
                  <select class="form-control select2" style="width: 100%;">
                   <option value ="{{$product->brand_id}}">{{$product->brand->brand_name}}</option>
                   @foreach($brand as $data)
                   <option value="{{$data->brand_id}}">{{$data->brand_name}}</option>
                   @endforeach
                 </select>
               </div>
             </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Unit</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option value="{{$product->unit}}">{{$product->unit}}</option>       
                    <option value="kg">Kg</option>
                    <option value="pc">pc</option>
                    <option value="gmc">gmc</option>
                    <option value="ltrs">ltrs</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Variations</h3>
          </div>

          <div class="card-body">
            <div class="row">
              <!-- /.col -->

              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Multiple (.select2-purple)</label>
                  <div class="select2-purple">
                    <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" id="product_colour" name="product_colour" style="width: 100%;">
                      <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                      <option style="color:#FF0000;" value="#FF0000">&#9724; Turquoise</option>
                      <option>AliceBlue</option>
                      <option>AntiqueWhite</option>
                      <option>Aqua</option>
                      <option>Aquamarine</option>
                      <option>Azure</option>
                      <option>Beige</option>
                      <option>Bisque</option>
                      <option>Black</option>
                      <option>BlanchedAlmond</option>
                      <option>Blue</option>
                      <option>BlueViolet</option>
                      <option>Brown</option>
                      <option>BurlyWood</option>
                      <option>CadetBlue</option>
                      <option>Chartreuse</option>
                      <option>Chocolate</option>
                      <option>Coral</option>
                      <option>CornflowerBlue</option>
                      <option>Cornsilk</option>
                      <option>Crimson</option>
                      <option>DarkBlue</option>
                      <option>DarkCyan</option>
                      <option>DarkGoldenrod</option>
                      <option>DarkGray</option>
                      <option>DarkGreen</option>
                      <option>DarkKhaki</option>
                      <option>DarkMagenta</option>
                      <option>DarkOliveGreen</option>
                      <option>DarkOrange</option>
                      <option>DarkOrchid</option>
                      <option>DarkRed</option>
                      <option>DarkSalmon</option>
                      <option>DarkGreen</option>
                      <option>DarkKhaki</option>
                      <option>DarkMagenta</option>
                      <option>DarkOliveGreen</option>
                      <option>DarkOrange</option>
                      <option>DarkOrchid</option>
                    </select>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Attributes</label>
                  <select class="form-control select2" style="width: 100%;" onchange="attribute1(this);">
                   <option selected="selected" value="sel1">{{$product->attribute}}</option> 
                    <option  id="" value="val1">Attribute 1</option>
                    <option value="val2">Attribute 2</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12" id="show" style="display:none;">
                <div class="row">
                  <div class="col-md-3 show">
                    <div class="form-group">
                      <label></label>
                      <input type="text" class="form-control" name="product_purchase_price" value="Attribute 1" placeholder="Purchase price" id="">
                    </div>
                  </div>
                  <div class="col-md-9 show">
                    <div class="form-group">
                      <label></label>
                      <input type="text" class="form-control" name="product_purchase_price" placeholder="" id="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12" id="show1" style="display:none;">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label></label>
                      <input type="text" class="form-control" name="product_purchase_price" value="Attribute 2" placeholder="">
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group">
                      <label></label>
                      <input type="text" class="form-control" name="product_purchase_price" placeholder="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Product price & stock</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-group">
                    <label>Unit price</label>
                    <input type="text" class="form-control" name="product_unit_price" value="{{$product->product_unit_price}}">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Purchase price</label>
                  <input type="text" class="form-control" name="product_purchase_price" placeholder="Purchase price" value="{{$product->product_purchase_price}}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tax Percent( % )</label>
                  <input type="text" class="form-control" name="product_tax" value="{{$product->product_tax}}">
                </div>
              </div>     
              <div class="col-md-4">
                <div class="form-group">
                  <label>Discount</label>
                  <input type="text" class="form-control" name="product_discount" value="{{$product->product_discount}}" placeholder="Product Discount" >
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Discount Type</label>
                  <select class="form-control select2" name="disc_type" style="width: 100%;">
                    <option selected="select" value="{{$product->disc_type}}">{{$product->disc_type}}</option>
                    <option>Flat</option>
                    <option>Percent</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Total Quantity</label>
                  <input type="text" class="form-control" name="product_qty" value="{{$product->product_qty}}" placeholder="Total Quantity">
                </div> 
              </div>     
              <div class="col-md-3">
                <div class="form-group">
                  <label>Minimum order quantity</label>
                  <input type="text" class="form-control" name="product_order_qty" placeholder="Minimum order quantity" value="{{$product->product_order_qty}}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Shipping cost</label>
                  <input type="text" class="form-control" name="product_shipping_cost" value="{{$product->product_shipping_cost}}" placeholder="Shipping cost">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                 <!--  <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1"> -->
                  <label for="customCheckbox1">Shipping cost multiply with quantity</label>
                 <label class="switch">
                  <input type="checkbox" value="shipping_cost_mul_qty" name="{{$product->shipping_cost_mul_qty}}">
                  <span class="slider round"></span>
                </label>
                 <!--  <label for="customCheckbox1" class="custom-control-label">Shipping cost multiply with quantity</label> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Seo section</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="form-group">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="product_unit_price" value="{{$product->meta_title}}">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Meta Description</label>
                  <textarea cols="70" rows="2" placeholder="Description">{{$product->product_description}}</textarea>
                </div>
              </div>     
              <div class="col-md-6">
                <div class="form-group">
                  <label >Meta Image</label>
                  <input type="file" class="form-control" id="contact_number1" value="{{$product->meta_img}}" name="meta_img">
                  <div class="col-md-6">
                    <div class="form-group">
                      <br>        
                      <img src="{{!empty($product->meta_img) ? URL($product->meta_img) : asset('images/no-img.png')}}" width="250px">     
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        
        </div>
      </div>
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <div class="form-group">
                  <label>Youtube video link ( Optional please provide embed link not direct link.)</label>
                  <input type="text" class="form-control" name="youtube_link" value="{{$product->youtube_link}}">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Upload product images* ( Ratio 1:1 )</label>
                <input type="file" class="form-control" id="contact_number1" value="{{$product->product_img}}" name="product_img">
                <div class="col-md-6">
                  <div class="form-group">
                    <br>        
                    <img src="{{!empty($product->product_img) ? URL($product->product_img) : asset('images/no-img.png')}}" width="250px">     
                  </div>
                </div>
              </div>
            </div>     
            <div class="col-md-6">
             <div class="form-group">
              <label >Upload thumbnail* ( Ratio 1:1 )</label>
              <input type="file" class="form-control" id="contact_number1" value="{{$product->thumbnail_img}}" name="thumbnail_img">
              <div class="col-md-6">
                <div class="form-group">
                  <br>        
                  <img src="{{!empty($product->thumbnail_img) ? URL($product->thumbnail_img) : asset('images/no-img.png')}}" width="250px">     
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- Product price & stock -->
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- /.content -->
 
 

<!-- jQuery -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->
<script>

 $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

      var category_id = '';
      function getSubcategory(value){
       $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      });
       jQuery.ajax({
        url: "{{ url('/subcategory/getsubcategory/') }}",
        method: 'POST',
        data: {category_id: value},
        success: function(result){
         console.log(result);
         $('#sub_category_id').html(result.area);
       }});
     }


  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End

  //subcategory

  const colorBox = document.getElementById('product_colour');
  colorBox.addEventListener('change', (event) => {
  const product_colour = event.target.value;
  event.target.style.product_colour = product_colour;
  }, false);

 
  
 
 

</script>

<!-- <script type="text/javascript">
   document.getElementById("show").style.display = "none";
  function attribute1(){
    document.getElementById("show").style.display = "block";
  }
</script> -->

<script type="text/javascript">
  function attribute1(that){
    if (that.value == "sel1") {
      document.getElementById("show").style.display = "none";
    }
    if (that.value == "val1") 
    {
        document.getElementById("show").style.display = "block";
    }
    if (that.value == "sel1") {
      document.getElementById("show1").style.display = "none";
    }
    if (that.value == "val2") {
      document.getElementById("show1").style.display = "block";
    }/*else
    {
      document.getElementById("show1").style.display = "none";
    }*/
    

  }
</script>
@endsection
