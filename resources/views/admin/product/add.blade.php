@extends('layouts.app')
@section('content')
<!-- Select2 -->
<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
<form action="javascript:void(0)" method="post" enctype="multipart/form-data">
  <!-- <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data"> -->
    {{method_field('post')}}
    {{ csrf_field() }}
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
                  <input type="text" class="form-control" name="product_name">
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
                    <option value="">--Select--</option>
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
                  <input type="text" class="form-control" name="product_code">
                </div>
              </div>     
              <div class="col-md-4">
                <div class="form-group">
                  <label>Brand</label>
                  <select class="form-control select2" style="width: 100%;">
                   <option selected="selected">--Select Brand--</option>
                   @foreach($brand as $data)
                   <option value="{{$data->brand_id}}">{{$data->brand_name}}</option>
                   @endforeach
                 </select>
               </div>
             </div>
             <div class="col-md-4">
              <div class="form-group">
                <label>Unit</label>
                <select class="form-control select2" style="width: 100%;" name="unit">
                  <option selected="selected">--Select Unit--</option>       
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
                  <select class="select2" multiple="multiple" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" id="product_colour" name="color_name[]" style="width: 100%;">
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

            <div class="col-12 col-sm-6">
              <div class="form-group">
                <label>Attributes</label>
                <div class="select2-purple">
                  <select class="select2" multiple="multiple" data-placeholder="Select Attribute" data-dropdown-css-class="select2-purple" id="button1" name="attribute_name[]"  style="width: 100%;">
                    @foreach($attribute as $att)
                    <option id="" value="{{$att->attribute_name}}">{{$att->attribute_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-12 col-sm-6" id="appendOption">

            </div>
            <!-- /.col -->
            @foreach($attribute as $att)
            <div class="col-md-12 bootstrap-tagsinput" id="list" style="display: none;"> 
              <div class="row">
                <div class="col-md-3 ">
                  <div class="form-group">
                    <label></label>
                    <input type="text" class="" name="product_purchase_price" value="Attribute 1" placeholder="Purchase price" id="">
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <div class="card mt-2 rest-part">
              <div class="card-header">
                <h4>Product price &amp; stock</h4>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label class="control-label">Unit price</label>
                      <input type="number" min="0" step="0.01" placeholder="Unit price" name="unit_price" class="form-control" value="1000" required="">
                    </div>
                    <div class="col-md-6">
                      <label class="control-label">Purchase price</label>
                      <input type="number" min="0" step="0.01" placeholder="Purchase price" name="purchase_price" class="form-control" value="600" required="">
                    </div>
                    <div class="col-md-4 mt-2">
                      <label class="control-label">Tax</label>
                      <label class="badge badge-info">Percent ( % )</label>
                      <input type="number" min="0" value="10" step="0.01" placeholder="Tax" name="tax" class="form-control" required="">
                      <input name="tax_type" value="percent" style="display: none">
                    </div>

                    <div class="col-md-4 mt-2">
                      <label class="control-label">Discount</label>
                      <input type="number" min="0" value="5" step="0.01" placeholder="Discount" name="discount" class="form-control" required="">
                    </div>
                    <div class="col-md-4 mt-6">
                      <select style="width: 100%" class="js-example-basic-multiple js-states js-example-responsive demo-select2 select2-hidden-accessible" name="discount_type" data-select2-id="23" tabindex="-1" aria-hidden="true">
                        <option value="percent" selected="" data-select2-id="25">Percent</option>
                        <option value="flat">Flat</option>

                      </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="24" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-discount_type-bg-container"><span class="select2-selection__rendered" id="select2-discount_type-bg-container" role="textbox" aria-readonly="true" title="Percent">Percent</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    </div>
                    <div class="col-12 pt-4 sku_combination" id="sku_combination"><table class="table table-bordered">
                      <thead>
                        <tr>
                          <td class="text-center">
                            <label for="" class="control-label">Variant</label>
                          </td>
                          <td class="text-center">
                            <label for="" class="control-label">Variant Price</label>
                          </td>
                          <td class="text-center">
                            <label for="" class="control-label">SKU</label>
                          </td>
                          <td class="text-center">
                            <label for="" class="control-label">Quantity</label>
                          </td>
                        </tr>
                      </thead>
                      <tbody id="tableBody">
                      </tbody>
                    </table> 
                  </div>
                  <div class="col-md-3" id="quantity">
                    <label class="control-label">Total Quantity</label>
                    <input type="number" min="0" value="11" step="1" placeholder="Quantity" name="current_stock" class="form-control" required="" readonly="readonly">
                  </div>
                  <div class="col-md-3" id="minimum_order_qty">
                    <label class="control-label">Minimum order quantity</label>
                    <input type="number" min="1" value="1" step="1" placeholder="Minimum order quantity" name="minimum_order_qty" class="form-control" required="">
                  </div>
                  <div class="col-md-3" id="shipping_cost">
                    <label class="control-label">Shipping cost </label>
                    <input type="number" min="0" value="5" step="1" placeholder="Shipping cost" name="shipping_cost" class="form-control" required="">
                  </div>
                  <div class="col-md-3" id="shipping_cost_multy">
                    <div>
                      <label class="control-label">Shipping cost multiply with quantity </label>

                    </div>
                    <div>
                      <label class="switch">
                        <input type="checkbox" name="multiplyQTY" id="" checked="">
                        <span class="slider round"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <br>
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
                <input type="text" class="form-control" name="product_unit_price">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Purchase price</label>
              <input type="text" class="form-control" name="product_purchase_price" placeholder="Purchase price">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Tax Percent( % )</label>
              <input type="text" class="form-control" name="product_tax">
            </div>
          </div>     
          <div class="col-md-4">
            <div class="form-group">
              <label>Discount</label>
              <input type="text" class="form-control" name="product_discount" placeholder="Product Discount" >
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Discount Type</label>
              <select class="form-control select2" style="width: 100%;" name="discount_type">
                <option selected="select">--Discount Type--</option>
                <option value="flat">Flat</option>
                <option value="percent">Percent</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Total Quantity</label>
              <input type="text" class="form-control" name="product_qty" placeholder="Total Quantity">
            </div> 
          </div>     
          <div class="col-md-3">
            <div class="form-group">
              <label>Minimum order quantity</label>
              <input type="text" class="form-control" name="product_order_qty" placeholder="Minimum order quantity">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Shipping cost</label>
              <input type="text" class="form-control" name="product_shipping_cost" placeholder="Shipping cost">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
             <!--  <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1"> -->
             <label for="customCheckbox1">Shipping cost multiply with quantity</label>
             <label class="switch">
              <input type="checkbox" value="shipping_cost_mul_qty" name="shipping_cost_mul_qty">
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
              <input type="text" class="form-control" name="meta_title">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Meta Description</label>
            <textarea cols="70" rows="2" placeholder="Description" name="meta_description"></textarea>
          </div>
        </div>     
        <div class="col-md-6">
         <div class="form-group">
          <label>Meta Image</label>
          <input type="file" class="form-control" id="contact_number1" value="meta_img" name="meta_img">
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
            <input type="text" class="form-control" name="youtube_link">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
         <label>Upload product images* ( Ratio 1:1 )</label>
         <input type="file" class="form-control" id="contact_number1" value="" name="product_img">
       </div>
     </div>     
     <div class="col-md-6">
       <div class="form-group">
        <label>Upload thumbnail* ( Ratio 1:1 )</label>
        <input type="file" class="form-control" id="contact_number1" value="thumbnail_img" name="thumbnail_img">
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
    url: "{{ url('/admin/subcategory/getsubcategory/') }}",
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
  // Dropzone.autoDiscover = false

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
  $(document).ready(function() {
    $('#button').change(function() {
      selection = $(this).val();
      switch (selection) {
        case '{{$att->attribute_id}}':
        $('#cardioyes').show();
      }
    });

    $("#button1").click(function(){
      $("#list").append("<input type='text class='form-control' name='product_purchase_price' value='Attribute 1' placeholder='Purchase price' id=''>");
    });

    $('select[name="attribute_name[]"]').on('change', function() {
      var attributeValue = $(this).val();
      let inputDiv = '';
      attributeValue.forEach(function(index){

        inputDiv += '<div class="row">'+
        '<div class="col-md-3">'+
        '<input type="hidden" name="choice_no[]" class="attributeButtoInput" value="'+index  +'">'+
        '<input type="text" class="form-control" name="choice[]" value="'+index  +'" placeholder="Choice Title" readonly=""></div><div class="col-lg-9"><div class="bootstrap-tagsinput"> <input type="text" name="attributeButtoInput[]" style="height: 32px" placeholder="Enter choice valuesqq" size="30"></div><input type="text" class="form-control" name="choice_options_3[]" placeholder="Enter choice values" data-role="tagsinput" onchange="update_sku()" style="display: none;"></div></div>';
      });
      $('#appendOption').empty();
      $('#appendOption').append(inputDiv);
    })
  });

  input = $('body').on('keypress','input[name="attributeButtoInput[]"]', function(e){
  if(e.keyCode  == 13)  // the enter key code
  {

   var attributeButtoInput = $('input[name^=attributeButtoInput]').map(function(idx, elem) {
    return $(elem).val();
  }).get();

   let inputDiv = '';
   attributeButtoInput.forEach(function(index){
    var abc = attributeButtoInput;

     if(index !== ''){
      console.log(index);
       inputDiv += '<tr>'+
       '<td>'+
       '<label for="" class="control-label">'+index + '</label>'+
       '</td>'+
       '<td>'+
       '<input type="number" name="price_Amethyst-xsize-ssize"  placeholder="Enter choice valuesqq" value="'+index+'" class="form-control unitprice" required="">'+
       '</td>'+
       '<td>'+
       '<input type="text" name="sku_Amethyst-xsize-ssize"  value="'+index+'" required="">'+
       ' </td>'+
       '<td>'+
       '<input type="number" name="qty_Amethyst-xsize-ssize" value="1" min="1" max="1000000" step="1" class="form-control " required="">'+
       '</td>'+
       '</tr>';
     }
   });
   $('#tableBody').empty();
   $('#tableBody').append(inputDiv);
 }
});

  $(document).on('change','input[name="unit_price"]',function(){
    unitPrice = $(this).val();
    //console.log(unitPrice);
    if($(this).val() != ''){
      $('input.unitprice').val(unitPrice);
    }
  });


</script>
<script type="text/javascript">
  $(".bootstrap-tagsinput input").addClass('form-control');
</script>
@endsection


