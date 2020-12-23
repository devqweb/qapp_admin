//////////////////////////////////////// EDIT CATEGORY /////////////////////////////////////////////
function edit_category(categoryId, button) {
    //alert("hiii");
        let count = 0;
        count++;
        const x = button.parents("tr");
        const btn_edit = button;
        let catName = "#catName";
        let slider_order = "#slider_order";
        let max_order = "#max_order";
        let myTable = $(".table-rep-plugin");

        catName += count;
        slider_order += count;
        max_order += count;

        btn_edit.hide();                                                                     
        button.next().addClass("btn-visible");
        button.next().click(function() {
            x.next().hide();
            button.removeClass("btn-visible");
            btn_edit.show();
        });
        
        x.after('<tr><td colspan="30" class="data-edit">'+
        '<div id="cat-edit-form-alert" class="alert alert-dismissible fade show col-md-6 update-status" role="alert"></div>'+
        '<form action = "" >'+
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
        //alert(categoryId);
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
            $.ajax({
                url: "http://localhost/qapp/admin/update_category_ajax",
                method: 'POST',
                dataType: 'json',
                data: { table: 'category', id: 'cat_id', cat_id: categoryId, cat_name: $(catName).val(), slider_order: $(slider_order).val() },
                success:function(res) {
                    if(res.response == 'success') {
                        // $("#cat-edit-form-alert").addClass("alert-success");
                        // $("#cat-edit-form-alert").css({"display": "block"});
                        // $("#cat-edit-form-alert").html("<b>Success</b>! Category has been updated");
                        $("#responsive-datatable").html(res.table_data);
                        $(".btn-edit-category").click(function() {
                            const categoryId = $(this).attr("data-cat-id");
                            let button = $(this);
                            edit_category(categoryId, button);
                        });
                        
                        //$("#cat-edit-form-alert").fadeTo(2000, 500).slideUp(1000);
                    }
                    else {
                        $("#cat-edit-form-alert").addClass("alert-danger");
                        $("#cat-edit-form-alert").css({"display": "block"});
                        $("#cat-edit-form-alert").html("<b>Failed</b>! Category not updated");
                        $("#cat-edit-form-alert").fadeTo(2000, 500).slideUp(1000);
                    }
                }
            });
        });
}
$(document).ready(function() {    
    $(".btn-edit-category").click(function() {
        const categoryId = $(this).attr("data-cat-id");
        let button = $(this);
        edit_category(categoryId, button);
    }); 
});
//////////////////////////////////// END OF EDIT CATEGORY //////////////////////////////////////////

////////////////////////////////////// EDIT HOME SLIDER ////////////////////////////////////////////
$(document).ready(function() {    
    let count = 0;
    $(".btn-edit-home-slider").click(function() {
        count++;
        const x = $(this).parents("tr");
        const btn_edit = $(this);
        let title = "#title";
        let des = "#des";
        let btn_link = "#btn_link";
        let slider_order = "#slider_order";
        let max_order = "#max_order";    

        title += count;
        des += count;
        btn_link += count;
        slider_order += count;
        max_order += count;
        
        const sliderId = $(this).attr("data-home-slider-id");

        btn_edit.hide();                                                                     
        $(this).next().addClass("btn-visible");
        $(this).next().click(function() {
            x.next().hide();
            $(this).removeClass("btn-visible");
            btn_edit.show();
        });
        
        x.after('<tr><td colspan="30" class="data-edit">'+
        '<div id="cat-edit-form-alert" class="alert alert-dismissible fade show col-md-6 update-status" role="alert"></div>'+
        '<form action = "" >'+
            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="title">Title *</label>'+
                    '<input type="text" id="title'+ count +'" name = "title" value="" class="form-control" placeholder="Title">'+
                '</div>'+
            '</div>'+
            
            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="des">Description *</label>'+
                    '<textarea id="des'+ count +'" name="des" class="form-control" placeholder="Description"></textarea>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="btn_link">Button Link *</label>'+
                    '<input type="url" id="btn_link'+ count +'" name = "btn_link" value="" class="form-control" placeholder="Button Link">'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="slider_order">Order in Slider * (Total items <span id="max_order'+ count +'"></span>) </label>'+
                    '<input type="number" id="slider_order'+ count +'" name = "slider_order" value="" class="form-control" placeholder="Slider Order">'+
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
            url: "http://localhost/qapp/admin/manage_home_slider_ajax",
            method: 'POST',
            dataType: 'json',
            data: { slider_id: sliderId, table: 'home_slider' },
            success:function(res){
                if(res.response=='success'){
                    $(title).val(res.app_data.title);
                    $(des).val(res.app_data.description);
                    $(btn_link).val(res.app_data.button_link);
                    $(slider_order).val(res.app_data.order_slider);
                    $(max_order).text(res.maximum_order.order_slider);
                }
            }
        });

        $(title).focus();
        
        $(".btn-update-category").click(function() {
            $.ajax({
                url: "http://localhost/qapp/admin/update_home_slider_ajax",
                method: 'POST',
                dataType: 'json',
                data: { table: 'home_slider', id: 'home_slider_id', slider_id: sliderId, title: $(title).val(), description: $(des).val(), btn_link: $(btn_link).val(), slider_order: $(slider_order).val() },
                success:function(res) {
                    if(res.response == 'success') {
                        $("#cat-edit-form-alert").addClass("alert-success");
                        $("#cat-edit-form-alert").css({"display": "block"});
                        $("#cat-edit-form-alert").html("<b>Success</b>! Home Slider has been updated");
                        $("#cat-edit-form-alert").fadeTo(2000, 500).slideUp(1000);
                    }
                    else {
                        $("#cat-edit-form-alert").addClass("alert-danger");
                        $("#cat-edit-form-alert").css({"display": "block"});
                        $("#cat-edit-form-alert").html("<b>Failed</b>! Home Slider not updated");
                        $("#cat-edit-form-alert").fadeTo(2000, 500).slideUp(1000);
                    }
                }
            });
        });
    }); 
});
////////////////////////////////// END OF EDIT HOME SLIDER /////////////////////////////////////////