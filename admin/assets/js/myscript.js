$(document).ready(function() {    
    let count = 0;
    $(".btn-edit").click(function() {
        count++;
        const x = $(this).parents("tr");
        const btn_edit = $(this);                                                                    
        let name = x.children(".cat_name").text();
        let order = x.children(".order_slider").text();
        let catName = "#catName";
        let order_slider = "#order_slider";
        let max_order = "#max_Order";

        catName += count;
        order_slider += count;
        max_order += count;

        const categoryId = $(this).attr("data-cat-id");

        btn_edit.hide();                                                                     
        $(this).next().addClass("btn-visible");
        $(this).next().click(function() {
            x.next().hide();
            $(this).removeClass("btn-visible");
            btn_edit.show();
        });
        
        x.after('<tr><td colspan="30">'+                                                                    
        '<form action = "http://localhost/qapp/admin/new_category" class="data-edit" method = "post" enctype = "multipart/form-data">'+
            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="catName">Category Name *</label>'+
                    '<input type="text" id="catName'+ count +'" name = "catName" value="" class="form-control" placeholder="Category Name" autofocus>'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="order">Order in Slider * (Max Order) <span id="max_Order'+ count +'"></span></label>'+
                    '<input type="number" id="order_slider'+ count +'" name = "order_slider" value="" class="form-control" placeholder="Category Name" autofocus>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "submit" name = "submit" class="btn btn-success waves-effect waves-light" value="Update Category">'+
                    '</a> &nbsp;&nbsp;&nbsp;'+
                    '<input type="reset" class="btn btn-danger" value="Cancel">'+
                '</div>'+
            '</div>'+
        '</form>'+
        '</td></tr>');
        
        $.ajax({
            url: "http://localhost/qapp/admin/manage_category_ajax",
            method: 'POST',
            dataType: 'json',
            data: { cat_id: categoryId, table: 'category' },
            success:function(res){
                if(res.response=='success'){
                    $(catName).val(res.app_data.name);
                    $(order_slider).val(res.app_data.order_in_slider);
                    //max_order = res.app_data.max_order;
                    //$(max_Order).text(res.max_order.order_in_slider);
                    //alert(max_Order);
                    //max_order = 
                    //alert(res.max_order.order_in_slider);
                }
            }
        });

        $(catName).focus();
    }); 
});