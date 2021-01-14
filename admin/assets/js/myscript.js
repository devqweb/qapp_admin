let count = 0;

//////////////////////////////////////// EDIT CATEGORY /////////////////////////////////////////////
function edit_category(categoryId, button) {    
    count++;
    const main_row = button.parents("tr");
    const btn_edit = button;
    const btn_cancel = button.next();
    
    let catName = "#catName";
    let slider_order = "#slider_order";
    let max_order = "#max_order";
    let myTable = $(".table-rep-plugin");

    catName += count;
    slider_order += count;
    max_order += count;

    btn_edit.hide();                                                                     
    btn_cancel.removeClass("display-none");
    
    main_row.after('<tr class="data-edit" id="editing_form'+ count +'"><td colspan="30">'+
    '<div id="cat-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<div class="form-row">'+
            '<div class="form-group col-md-6">'+
                '<label class="col-form-label" for="catName">Category Name *</label>'+
                '<input type="text" id="catName'+ count +'" name = "catName" value="" class="form-control catName" placeholder="Category Name" autofocus>'+
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
    '</td></tr>');

    $.ajax({
        url: "http://localhost/qapp/admin/manage_category_ajax",
        method: 'POST',
        dataType: 'json',
        data: { cat_id: categoryId, table: 'category' },
        success:function(res){
            if(res.response == 'success'){
                $(catName).val(res.app_data.name);
                $(slider_order).val(res.app_data.order_in_slider);
                $(max_order).text(res.maximum_order.order_in_slider);
            }
        }
    });

    $(catName).focus();
    
    $(".btn-update-category").click(function() {
        let myform = $(this).parents(".data-edit");
        $.ajax({
            url: "http://localhost/qapp/admin/update_category_ajax",
            method: 'POST',
            dataType: 'json',
            data: { table: 'category', id: 'cat_id', cat_id: categoryId, cat_name: $(catName).val(), slider_order: $(slider_order).val() },
            success:function(res) {
                if(res.response == 'success') {                    
                    setTimeout(function(){
                        myform.find(".alert").addClass("alert-success");
                        myform.find(".alert").removeClass("display-none");
                        myform.find(".alert").html("<b>Success</b>! Category has been updated");
                    },400);
                    
                    myform.prev().html(res.table_data);
                    setTimeout(function(){ myform.fadeOut(1000); }, 1000);
                    setTimeout(function(){ myform.remove(".data-edit"); }, 2000);
                }
                else {
                    myform.find(".alert").hide();
                    myform.find(".alert").addClass("alert-danger");
                    myform.find(".alert").removeClass("display-none");
                    myform.find(".alert").html("<b>Failed</b>! Category not updated");
                    myform.find(".catName").focus();
                    myform.find(".alert").fadeTo(2000, 500).slideUp(1000);
                }
            }
        });
    });
    
    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        btn_edit.show();
    });
}

function my_cat_edit(button) {    
    const categoryId = button.getAttribute("data-cat-id");
    edit_category(categoryId, $(button));
}
//////////////////////////////////// END OF EDIT CATEGORY //////////////////////////////////////////

////////////////////////////////// ENABLE/DISABLE CATEGORY /////////////////////////////////////////
function cat_enable_disable(categoryId, cat_status, myRow) {
    cat_status ^= true;
    $.ajax({
        url: "http://localhost/qapp/admin/enable_disable_category_ajax",
        method: 'POST',
        dataType: 'json',
        data: { table: 'category', id: 'cat_id', cat_id: categoryId, enable_disable: cat_status },
        success:function(res) {
            if(res.response == 'success') {
                $(myRow).toggleClass("my-danger");
                $(myRow).find(".app-status").attr("data-enable-disable", cat_status);
                // let myText =  $(myRow).find(".app-status");
                // if($(myText).text() == "Enable") $(myText).text("Disable");
                // else $(myText).text("Enable");
            }
            else {
                alert("Oops! opertion failed");
            }
        }
    });
}

function my_cat_enable_disable(button) {
    const categoryId = button.getAttribute("data-cat-id");
    const cat_status = button.getAttribute("data-enable-disable");
    const myRow = $(button).parents(".record-row");
    cat_enable_disable(categoryId, cat_status, $(myRow));
}
/////////////////////////////// END OF ENABLE/DISABLE CATEGORY /////////////////////////////////////


/////////////////////////////////// CALL CONFIRMATION MODAL ////////////////////////////////////////
function confirm_modal(button) {
    const recordId = button.getAttribute("data-cat-id");
    const tableName = button.getAttribute("data-table-name");
    const idField = button.getAttribute("data-table-field");
    $("#hidden_delete_id").val(recordId);
    $("#hidden_table_name").val(tableName);
    $("#hidden_field_name").val(idField);
    $("#modal_confirm_category").show();
}
////////////////////////////// END OF CALL CONFIRMATION MODAL //////////////////////////////////////


///////////////////////////////// COMMON DELETE RECORD FUNCTION ////////////////////////////////////
function delete_record() {
    const recordId = $("#hidden_delete_id").val();
    const tableName = $("#hidden_table_name").val();
    const idField = $("#hidden_field_name").val();

    $.ajax({
        url: "http://localhost/qapp/admin/common_delete_ajax",
        method: 'POST',
        dataType: 'json',
        data: { table: tableName, id: idField, record_id: recordId },
        success:function(res) {
            if(res.response == 'success') {
                $("#modal_confirm_category").hide();
                $('#success_delete').modal('toggle');
                // $(myRow).toggleClass("my-danger");
                // $(myRow).find(".app-status").attr("data-enable-disable", cat_status);
                // let myText =  $(myRow).find(".app-status");
                // if($(myText).text() == "Enable") $(myText).text("Disable");
                // else $(myText).text("Enable");
                
            }
            else {
                $("#modal_confirm_category").hide();
                $('#failed_box').modal('toggle');
            }
        }
    });
}
//////////////////////////// END OF COMMON DELETE RECORD FUNCTION //////////////////////////////////


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
            main_row.next().hide();
            $(this).removeClass("btn-visible");
            btn_edit.show();
        });
        
        main_row.after('<tr><td colspan="30" class="data-edit">'+
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