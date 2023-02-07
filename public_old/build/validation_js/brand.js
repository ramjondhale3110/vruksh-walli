
$(document).ready(function(){
    $("#example").DataTable({
        "processing" : true,
        "serverSide" : true,
        "responsive" : true,
        ajax: base_url +  "/alldatatable",
        "order" : [
            [0,"asc"]
        ],
        "columns" :[
        {
            "mData":"brand_id",
        },{
            "mData" : "brand_name"
        },]
    })
});
