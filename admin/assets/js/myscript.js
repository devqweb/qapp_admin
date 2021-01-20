let count = 0;
let selected_row;

//////////////////////////// CLEAR REQUIRED ERROR WHEN FIELD HAS VALUE /////////////////////////////
function clearError(field) {
    $(field).next().text("");
}
////////////////////// END OF CLEAR REQUIRED ERROR WHEN FIELD HAS VALUE ////////////////////////////


//////////////////////////////////////// EDIT CATEGORY /////////////////////////////////////////////
function edit_category(categoryId, srNum, button) {    
    count++;
    const main_row = button.parents("tr");
    const btn_edit = button;
    const btn_cancel = button.next();

    let loopOrder;
    let oldOrder;
    let oldCatName;
    let update_category = "#update_category";
    let catName = "#catName";
    let slider_order = "#slider_order";
    let max_order = "#max_order";
    //let myTable = $(".table-rep-plugin");

    oldCatName += count;  
    catName += count;
    slider_order += count;
    max_order += count;
    update_category += count;

    btn_edit.hide();                                                                     
    btn_cancel.removeClass("display-none");
    
    main_row.after('<tr class="data-edit" id="editing_form'+ count +'"><td colspan="30">'+
    '<div id="cat-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<form>'+
            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="catName">Category Name *</label>'+
                    '<input type="text" id="catName'+ count +'" name = "catName" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control catName" placeholder="Category Name" autofocus>'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="order">Order in Slider </label>'+
                    //'<input type="number" id="slider_order'+ count +'" name = "slider_order" value="" class="form-control" placeholder="Category Name" autofocus>'+
                    '<select id="max_order'+ count +'" name="slider_order" class="form-control"></select>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_category'+count+'" class="btn btn-success waves-effect waves-light btn-update-category" value="Update Category">'+
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
            if(res.response == 'success'){
                $(catName).val(res.app_data.name);
                oldCatName = res.app_data.name;                  
                loopOrder = res.maximum_order.order_in_slider;
                for(i = 1; i <= loopOrder; i++) {
                    if(i == res.app_data.order_in_slider) {
                        $(max_order).append("<option value='"+i+"' selected>"+i+"</option>");
                        oldOrder = i;
                    }
                    else $(max_order).append("<option value='"+i+"'>"+i+"</option>");
                }
            }
        }
    });

    $(catName).focus();
    
    $(update_category).click(function() {
        
        let myform = $(this).parents(".data-edit");
        let duplicate_status = 0;
        $(catName).next().text("");
        //alert($(catName).val());
        if($(catName).val() != '') {                        
            
            if($(max_order).val() == oldOrder || $(catName).val() != oldCatName) {
                $.ajax({
                    url: "http://localhost/qapp/admin/check_duplicate_ajax",
                    method: 'POST',
                    dataType: 'json',
                    data: { table: 'category', field: 'name', value: $(catName).val() },
                    success:function(res) {
                        if(res.duplicate == 'yes') {                                                
                            $(catName).next().text("Category name must be unique.");
                            duplicate_status = 1;                            
                        }                       
                    }
                });
            }

            setTimeout(function() {
                if(duplicate_status == 0) {
                    $.ajax({
                        url: "http://localhost/qapp/admin/update_category_ajax",
                        method: 'POST',
                        dataType: 'json',
                        data: { table: 'category', id: 'cat_id', cat_id: categoryId, cat_name: $(catName).val(), slider_order: $(max_order).val(), sr_num: srNum },
                        success:function(res) {
                            if(res.response == 'success') {                    
                                //setTimeout(function(){
                                    // myform.find(".alert").addClass("alert-success");
                                    // myform.find(".alert").removeClass("display-none");
                                    // myform.find(".alert").html("<b>Success</b>! Category has been updated");
                                //},400);
                                
                                myform.prev().html(res.table_data);
                                myform.remove(".data-edit");
                                // setTimeout(function(){ myform.fadeOut(1000); }, 1000);
                                // setTimeout(function(){ myform.remove(".data-edit"); }, 2000);
                            }
                            else {
                                //setTimeout(function(){
                                    myform.find(".alert").hide();
                                    myform.find(".alert").addClass("alert-danger");
                                    myform.find(".alert").removeClass("display-none");
                                    myform.find(".alert").html("<b>Failed</b>! Category not updated");
                                    myform.find(".catName").focus();
                                    myform.find(".alert").fadeTo(2000, 500).slideUp(1000);
                                //}, 400);                          
                            }
                        }
                    });
                }
            }, 300);
        }
        else {
            $(catName).next().text("Please enter Category Name.");
        }        
    });
    
    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        btn_edit.show();
    });
}

function my_cat_edit(button) {    
    const categoryId = button.getAttribute("data-row-id");
    const srNum = button.getAttribute("data-sr-num");
    edit_category(categoryId, srNum, $(button));
}
//////////////////////////////////// END OF EDIT CATEGORY //////////////////////////////////////////


///////////////////////////////////////// EDIT APP /////////////////////////////////////////////////
function edit_app(appId, srNum, button) {    
    count++;
    const main_row = button.parents("tr");
    const btn_edit = button;
    const btn_cancel = button.next();

    let = "#nameOfApp";
    let = "#companyName";

    btn_edit.hide();                                                                     
    btn_cancel.removeClass("display-none");

    main_row.after('<tr class="data-edit" id="editing_form'+ count +'"><td colspan="30">'+
    '<div id="cat-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<form>'+
            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="nameOfApp">Name of the App <span class="text-danger"> <span class="text-danger">*</span></label>'+  
                    '<input type="text" id="nameOfApp" name="nameOfApp" value="" class="form-control" placeholder="Name of the App" autofocus>'+
                    
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="companyName">Company Name <span class="text-danger">*</span></label>'+
                    '<input type="text" id="companyName" name="companyName" value="" class="form-control" placeholder="Company Name">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="contactPerson">Contact Person <span class="text-danger">*</span></label>'+
                    '<input type="text" id="contactPerson" name="contactPerson" value="" class="form-control" placeholder="Contact Person">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="mobileNumber">Mobile Number <span class="text-danger">*</span></label>'+
                    '<input type="mobile" id="mobileNumber" name="mobileNumber" value="" class="form-control" placeholder="Mobile Number">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="whatsapp">WhatsApp Number</label>'+
                    '<input type="mobile" id="whatsapp" name="whatsapp" value="" class="form-control" placeholder="WhatsApp Number">'+                    
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="email">E-Mail <span class="text-danger">*</span></label>'+
                    '<input type="email" name="email" id="email" value="" class="form-control" placeholder="E-Mail">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="category">Category of The App  <span class="text-danger">*</span></label>'+
                    '<select class="form-control" id="category" name="category">'+
                        '<option value="">-- Select Category --</option>'+
                    '</select>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="dateOfLastUpdate">Date of Last Update</label>'+
                    '<input type="date" id="dateOfLastUpdate" name="dateOfLastUpdate" value="" class="form-control">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="videoLink">Video Link</label>'+
                    '<input type="url" id="videoLink" name="videoLink" value="" class="form-control" placeholder="https://www.youtube.com/myvideo">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="androidLink">Android Link</label>'+
                    '<input type="url" id="androidLink" name="androidLink" value="" class="form-control" placeholder="https://www.playstore.com/myapp">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="iosLink">IOS Link</label>'+
                    '<input type="url" id="iosLink" name="iosLink" value="" class="form-control" placeholder="https://www.appstore.com/myapp">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="instaLink">Instagram Link</label>'+
                    '<input type="url" id="instaLink" name="instaLink" value="" class="form-control" placeholder="https://www.instagram.com/myapp">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="fbLink">Facebook Link</label>'+
                    '<input type="url" id="fbLink" name="fbLink" value="" class="form-control" placeholder="https://www.facebook.com/myapp">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="website">Website</label>'+
                    '<input type="url" id="website" name="website" value="" class="form-control" placeholder="https://www.myapp.com">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="rating">App Rating <span class="text-danger">*</span></label>'+
                    '<input type="text" id="rating" name="rating" value="" class="form-control" placeholder="3.5, 4.4, etc">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="appIstalls">Number of App Installs <span class="text-danger">*</span></label>'+
                    '<input type="number" id="appIstalls" name="appIstalls" value="" class="form-control" placeholder="Number of App Installs">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="appsize">Size of The App(MB) <span class="text-danger">*</span></label>'+
                    '<input type="text" name="appsize" value="" id="appsize" class="form-control" placeholder="Size in MB">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="appLanguage">Languages in the App  <span class="text-danger">*</span></label>'+
                    '<div class="col-md-6 checkbox checkbox-blue">'+
                        '<span>'+
                            '<input id="english" name="english" value=1 type="checkbox" data-parsley-multiple="group1">'+
                            '<label for="english"> English </label>'+
                        '</span>&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<span>'+
                            '<input id="arabic" name="arabic" value=1 type="checkbox" data-parsley-multiple="group1">'+
                            '<label for="arabic"> Arabic </label>'+
                        '</span>'+
                    '</div>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="tags">Tags *</label>'+
                    '<input type="text" class="form-control" name = "tags" value="" data-role="tagsinput">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="description">App Description*</label>'+
                    '<textarea name="description" id="description" name="description" cols="30" rows="5" class="form-control" placeholder="App Description"></textarea>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_category'+count+'" class="btn btn-success waves-effect waves-light btn-update-category" value="Update Category">'+
                    '</a> &nbsp;&nbsp;&nbsp;'+
                    '<input type="reset" class="btn btn-danger" value="Cancel">'+
                '</div>'+
            '</div>'+
        '</form>'+
    '</td></tr>');

    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        btn_edit.show();
    });
}

function my_app_edit(button) {    
    const appId = button.getAttribute("data-row-id");
    const srNum = button.getAttribute("data-sr-num");
    edit_app(appId, srNum, $(button));
}
////////////////////////////////////// END OF EDIT APP /////////////////////////////////////////////


//////////////////////////////////// EDIT HOME SLIDER //////////////////////////////////////////////
function edit_home_slider(sliderId, srNum, button) {
    count++;
    const main_row = button.parents("tr");
    const btn_edit = button;
    const btn_cancel = button.next();

    let title = "#title";
    let des = "#des";
    let btn_link = "#btn_link";
    let slider_order = "#slider_order";
    let max_order = "#max_order";
    let update_home_slider = "#update_home_slider";
    let oldTitle;
    let loopOrder;
    let oldOrder;
    let oldDes;
    let oldButtonLink;

    title += count;
    des += count;
    btn_link += count;
    slider_order += count;
    max_order += count;
    update_home_slider += count;

    btn_edit.hide();                                                                     
    btn_cancel.removeClass("display-none");
    
    main_row.after('<tr class="data-edit"><td colspan="30" class="data-edit">'+
        '<div id="home-slider-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<form action = "" >'+
            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="title">Title *</label>'+
                    '<input type="text" id="title'+ count +'" name = "title" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="Title">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+
            
            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="des">Description</label>'+
                    '<textarea id="des'+ count +'" name="des" class="form-control" placeholder="Description" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this);></textarea>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="btn_link">Button Link *</label>'+
                    '<input type="url" id="btn_link'+ count +'" name = "btn_link" value="" class="form-control" placeholder="Button Link" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this);>'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="slider_order">Order in Slider *</label>'+
                    '<select id="slider_order'+ count +'" name="slider_order" class="form-control"></select>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_home_slider'+count+'" class="btn btn-success waves-effect waves-light btn-update-home-slider" value="Update Home Slider">'+
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
            if(res.response == 'success'){
                $(title).val(res.app_data.title);
                oldTitle = res.app_data.title;
                $(des).val(res.app_data.description);
                $(btn_link).val(res.app_data.button_link);
                loopOrder = res.maximum_order.order_slider;
                oldDes = res.app_data.description;
                oldButtonLink = res.app_data.button_link;

                for(i = 1; i <= loopOrder; i++) {
                    if(i == res.app_data.order_slider) {
                        $(slider_order).append("<option value='"+i+"' selected>"+i+"</option>");
                        oldOrder = i;
                    }
                    else $(slider_order).append("<option value='"+i+"'>"+i+"</option>");
                }
            }
        }
    });

    $(title).focus();
    
    $(update_home_slider).click(function() {
        
        let myform = $(this).parents(".data-edit");        
        let duplicate_status = 0;
        $(title).next().text("");
            
        if(($(des).val() == oldDes && $(btn_link).val() == oldButtonLink && $(slider_order).val() == oldOrder) || $(title).val() != oldTitle) {
            $.ajax({
                url: "http://localhost/qapp/admin/check_duplicate_ajax",
                method: 'POST',
                dataType: 'json',
                data: { table: 'home_slider', field: 'title', value: $(title).val() },
                success:function(res) {
                    if(res.duplicate == 'yes') {                                                
                        $(title).next().text("Home Slider name must be unique.");
                        duplicate_status = 1;                            
                    }                       
                }
            });
        }

        if($(title).val() == '' || $(btn_link).val() == '') {
            if($(title).val() == '') {
                $(title).next().text("Please enter Title.");
            }
            if($(btn_link).val() == '') {
                $(btn_link).next().text("Please enter Button Link.");
            }
        }

        else {                
            setTimeout(function() {                    
                if(duplicate_status == 0) {                        
                    $.ajax({
                        url: "http://localhost/qapp/admin/update_home_slider_ajax",
                        method: 'POST',
                        dataType: 'json',
                        data: { table: 'home_slider', id: 'home_slider_id ', slider_id: sliderId, slider_title: $(title).val(), description: $(des).val(), slider_btn_link: $(btn_link).val(), home_slider_order:  $(slider_order).val(), sr_num: srNum },
                        success:function(res) {
                            if(res.response == 'success') {
                                myform.prev().html(res.table_data);
                                myform.remove(".data-edit");
                            }
                            else {
                                //setTimeout(function(){
                                    myform.find(".alert").hide();
                                    myform.find(".alert").addClass("alert-danger");
                                    myform.find(".alert").removeClass("display-none");
                                    myform.find(".alert").html("<b>Failed</b>! Home slider not updated");
                                    $(title).focus();
                                    myform.find(".alert").fadeTo(2000, 500).slideUp(1000);
                                //}, 400);                          
                            }
                        }
                    });                                
                }
            }, 300);
        }            
               
    });
    
    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        btn_edit.show();
    });
}

function my_home_slider_edit(button) {    
    const sliderId = button.getAttribute("data-row-id");
    const srNum = button.getAttribute("data-sr-num");
    edit_home_slider(sliderId, srNum, $(button));
}
///////////////////////////////// END OF EDIT HOME SLIDER //////////////////////////////////////////


///////////////////////////////////// EDIT TRANDING BANNER /////////////////////////////////////////
function edit_trending_banner(bannerId, srNum, button) {
    count++;
    const main_row = button.parents("tr");
    const btn_edit = button;
    const btn_cancel = button.next();
    
    let slider_order = "#slider_order";
    let max_order = "#max_order";
    let update_trending_banner = "#update_trending_banner";    
    let loopOrder;
    let oldOrder;    
    
    slider_order += count;
    max_order += count;
    update_trending_banner += count;

    btn_edit.hide();                                                                     
    btn_cancel.removeClass("display-none");
    
    main_row.after('<tr class="data-edit"><td colspan="30" class="data-edit">'+
        '<div id="home-slider-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<form action = "" >'+
            '<div class="form-row">'+                
                '<div class="form-group col-md-6">'+
                    '<label class="col-form-label" for="slider_order">Order in Slider </label>'+
                    '<select id="slider_order'+ count +'" name="slider_order" class="form-control"></select>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_trending_banner'+count+'" class="btn btn-success waves-effect waves-light btn-update-home-slider" value="Update Home Slider">'+
                    '</a> &nbsp;&nbsp;&nbsp;'+
                    '<input type="reset" class="btn btn-danger" value="Cancel">'+
                '</div>'+
            '</div>'+
        '</form>'+
        '</td></tr>');

    $.ajax({
        url: "http://localhost/qapp/admin/manage_trending_banner_ajax",
        method: 'POST',
        dataType: 'json',
        data: { banner_id: bannerId, table: 'trending_banner' },
        success:function(res){
            if(res.response == 'success'){                
                loopOrder = res.maximum_order.order_slider;                   
                for($i = 1; $i <= loopOrder; $i++) {
                    if($i == res.app_data.order_slider) {
                        $(slider_order).append("<option value='"+$i+"' selected>"+$i+"</option>");
                        //oldOrder = i;
                    }
                    else $(slider_order).append("<option value='"+$i+"'>"+$i+"</option>");
                }
            }
        }
    });
    
    $(update_trending_banner).click(function() {
        
        let myform = $(this).parents(".data-edit");        
        
		$.ajax({
			url: "http://localhost/qapp/admin/update_trending_banner_ajax",
			method: 'POST',
			dataType: 'json',
			data: { table: 'trending_banner', id: 'trending_id ', banner_id: bannerId, trending_slider_order:  $(slider_order).val(), sr_num: srNum },
			success:function(res) {
				if(res.response == 'success') {
					myform.prev().html(res.table_data);
					myform.remove(".data-edit");
				}
				else {
					//setTimeout(function(){
						myform.find(".alert").hide();
						myform.find(".alert").addClass("alert-danger");
						myform.find(".alert").removeClass("display-none");
						myform.find(".alert").html("<b>Failed</b>! Home slider not updated");
						$(title).focus();
						myform.find(".alert").fadeTo(2000, 500).slideUp(1000);
					//}, 400);                          
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

function my_trending_banner_edit(button) {    
    const bannerId = button.getAttribute("data-row-id");
    const srNum = button.getAttribute("data-sr-num");
    edit_trending_banner(bannerId, srNum, $(button));
}
///////////////////////////////// END OF EDIT TRANDING BANNER //////////////////////////////////////


/////////////////////////////// COMMON ENABLE/DISABLE RECORD ///////////////////////////////////////
function enable_disable_process(rowId, row_status, table_name, idField, myRow) {
    row_status ^= true;
    $.ajax({
        url: "http://localhost/qapp/admin/enable_disable_record_ajax",
        method: 'POST',
        dataType: 'json',
        data: { table: table_name, id: idField, row_id: rowId, enable_disable: row_status },
        success:function(res) {
            if(res.response == 'success') {
                $(myRow).toggleClass("bg-dark-blur text-white");
                $(myRow).find(".app-status").attr("data-enable-disable", row_status);
            }
            else {
                alert("Oops! opertion failed");
            }
        }
    });
}

function enable_disable_data(button) {
    const rowId = button.getAttribute("data-row-id");
    const row_status = button.getAttribute("data-enable-disable");
    const table_name = button.getAttribute("data-table-name");
    const idField = button.getAttribute("data-table-id-field");
    const myRow = $(button).parents(".record-row");    
    enable_disable_process(rowId, row_status, table_name, idField, $(myRow));
}
//////////////////////////// END OF COMMON ENABLE/DISABLE RECORD ////////////////////////////////////


/////////////////////////////////// COMMON CONFIRMATION MODAL ///////////////////////////////////////
function confirm_modal_delete(button) {
    const recordId = button.getAttribute("data-row-id");
    const tableName = button.getAttribute("data-table-name");
    const idField = button.getAttribute("data-table-id-field");
    const order_field = button.getAttribute("data-order-field");
    selected_row = $(button).parents(".record-row");

    $("#hidden_record_id").val(recordId);
    $("#hidden_table_name").val(tableName);
    $("#hidden_field_name").val(idField);
    $("#hidden_order").val(order_field);
}
//////////////////////////// END OF COMMON CONFIRMATION MODAL //////////////////////////////////////


///////////////////////////////// COMMON DELETE RECORD FUNCTION ////////////////////////////////////
function delete_record() {
    const recordId = $("#hidden_record_id").val();
    const tableName = $("#hidden_table_name").val();
    const idField = $("#hidden_field_name").val();
    const order_field_name = $("#hidden_order").val();
    
    $.ajax({
        url: "http://localhost/qapp/admin/common_delete_ajax",
        method: 'POST',
        dataType: 'json',
        data: { table: tableName, id: idField, record_id: recordId, order_field: order_field_name },
        success:function(res) {
            if(res.response == 'success') {
                $("#modal_confirm_category").hide();
                $("#success_modal").find("h1").text("Deleted!");
                $("#success_modal").find("p").text("Your record has been deleted.");
                $('#success_modal').modal('toggle');
                const nextForm = $(selected_row).next(".data-edit");
                selected_row.remove();
                nextForm.remove();
            }
            else {
                $("#modal_confirm_category").hide();
                $('#failed_modal').modal('toggle');
            }
        }
    });
}
//////////////////////////// END OF COMMON DELETE RECORD FUNCTION //////////////////////////////////


////////////////////////////////// COMMON MODAL FOR CHANGE IMAGE ///////////////////////////////////
function change_image_data(button) {
    const recordId = button.getAttribute("data-row-id");
    const tableName = button.getAttribute("data-table-name");
    const idField = button.getAttribute("data-table-id-field");
    const imageField = button.getAttribute("data-table-image-field");
    const imgPath = button.getAttribute("data-img-path");

    //alert(recordId+", "+tableName+", "+idField+", "+imageField+", "+imgPath);
    
    selected_row = $(button).parents(".record-row");
    
    $("#hidden_image_row_id").val(recordId);
    $("#hidden_image_table_name").val(tableName);
    $("#hidden_imageId_field_name").val(idField);
    $("#hidden_image_field_name").val(imageField);
    $("#hidden_image_path").val(imgPath);
}
///////////////////////////// END OF COMMON MODAL FOR CHANGE IMAGE //////////////////////////////////


////////////////////////////////////// COMMON CHANGE IMAGE /////////////////////////////////////////
function change_image_process() {    
    const recordId = $("#hidden_image_row_id").val();
    const tableName = $("#hidden_image_table_name").val();
    const idField = $("#hidden_imageId_field_name").val();
    const imageFieldName = $("#hidden_image_field_name").val();
    const imgPath = $("#hidden_image_path").val();
    const newImage = $('#text_change_image')[0].files;

    //alert(recordId+", "+tableName+", "+idField+", "+imageFieldName+", "+imgPath);
    
    let fd = new FormData();
    
    if(newImage.length > 0 ) {
        fd.append('table', tableName);
        fd.append('id', idField);
        fd.append('record_id', recordId);
        fd.append('image_field', imageFieldName);
        fd.append('imageFile', newImage[0]);
        fd.append('folderPath', imgPath);

        $.ajax({
            url: "http://localhost/qapp/admin/change_image_ajax",
            type: 'post',
            dataType: 'json',
            data: fd,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.response == "success") {
                    $("#change_image").modal("toggle");
                    $("#success_modal").modal("toggle");
                    $("#success_modal").find("h1").text("Success!");
                    $("#success_modal").find("p").text("Image has been changed.");
                    $("#text_change_image").val("");
                }
                else{
                    $('#failed_modal').modal('toggle');
                }
                $(selected_row).find(".data-img").attr("src", imgPath+'/'+res.image_name);
            },
        });
    }
    else{
        $("#change_image").find(".required_error").text("Please select a file.");
    }
}
///////////////////////////////// END OF COMMON CHANGE IMAGE ////////////////////////////////////////


///////////// CLEAR INPUT TYPE FILE AND REQUIRED ERROR WHEN CLICK ON CANCEL BUTTON /////////////////
function clearFields() {
    $("#text_change_image").val("");
    $("#change_image").find(".required_error").text("");
}
////////////END OF CLEAR INPUT TYPE FILE AND REQUIRED ERROR WHEN CLICK ON CANCEL BUTTON ////////////