$(document).ready(function() {    
    let count = 0;
    $(".btn-edit-category").click(function() {
        count++;
        const x = $(this).parents("tr");
        const btn_edit = $(this);                                                                    
        let name = x.children(".cat_name").text();
        let order = x.children(".slider_order").text();
        let catName = "#catName";
        let slider_order = "#slider_order";
        let max_order = "#max_order";
        let status_class = "";
        let status_msg = "";

        catName += count;
        slider_order += count;
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
        '<div id="form-alert" class="alert '+status_class+' alert-dismissible fade show col-md-6 update-status" role="alert">'+
            status_msg+
            // +'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '</div>'+
        '<form action = "" class="data-edit">'+
            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="catName">Category Name *</label>'+
                    '<input type="text" id="catName'+ count +'" name = "catName" value="" class="form-control" placeholder="Category Name" autofocus>'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="order">Order in Slider * (Total items <span id="max_order'+ count +'"></span>) </label>'+
                    '<input type="number" id="slider_order'+ count +'" name = "slider_order" value="" class="form-control" placeholder="Category Name" autofocus>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" class="btn btn-success waves-effect waves-light btn-update-category" value="Update Category">'+
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
                    $(slider_order).val(res.app_data.order_in_slider);
                    $(max_order).text(res.maximum_order.order_in_slider);
                }
            }
        });

        $(catName).focus();
        
        $(".btn-update-category").click(function() {
            //alert($(catName).val());
            $.ajax({
                url: "http://localhost/qapp/admin/update_category_ajax",
                method: 'POST',
                dataType: 'json',
                data: { table: 'category', id: 'cat_id', cat_id: categoryId, cat_name: $(catName).val(), slider_order: $(slider_order).val() },
                success:function(res) {
                    //alert("hiiiiiiii");
                    if(res.response == 'success') {
                        status_class = "alert-success";
                        status_msg = "<b>Success</b>! Category has been updated";
                        // alert("success");
                        $(".update-status").text("<b>Success</b>! Category has been updated");
                    }
                    else {
                        alert("failed");
                        // status_class = "alert-danger";
                        // status_msg = "<b>Failed</b>! Category didn't updated";
                    }
                }
            });
        });
    }); 
});