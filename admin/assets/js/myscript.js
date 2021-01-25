let count = 0;
let imgRow = 0;
let selected_row;


//////////////////////////// CLEAR REQUIRED ERROR WHEN FIELD HAS VALUE /////////////////////////////
function clearError(field) {
    $(field).next().text("");
}

function clearErrorCheckBox(field) {
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


/////////////////////////////////////// EDIT APP BASIC DETAILS /////////////////////////////////////
function edit_app(appId, srNum, button) {    
    count++;
    const main_row = button.parents("tr");
    const btn_edit = button;
    const btn_cancel = button.next();

    main_row.find(".edit_des").addClass("disabled");
    main_row.find(".edit_screenshots").addClass("disabled");

    let nameOfApp = "#nameOfApp"; let companyName = "#companyName"; let contactPerson = "#contactPerson";
    let telcode_mobile = "#telcode_mobile"; let mobileNumber = "#mobileNumber"; let telcode_whatsapp = "#telcode_whatsapp";
    let whatsapp = "#whatsapp"; let email= "#email"; let category= "#category"; let dateOfLastUpdate = "#dateOfLastUpdate";
    let videoLink = "#videoLink"; let androidLink = "#androidLink"; let iosLink = "#iosLink"; let instaLink = "#instaLink";
    let fbLink = "#fbLink"; let website = "#website"; let rating = "#rating"; let appIstalls = "#appIstalls";
    let appsize = "#appsize"; let english = "#english"; let arabic = "#arabic"; let app_language = "#app_language";
    let tags = "#tags"; let description = "#description"; let update_app = "#update_app";
    
    let old_nameOfApp, old_companyName, old_contactPerson, old_telcode_mobile, old_mobileNumber, old_telcode_whatsapp,
    old_whatsapp, old_email, old_category, old_dateOfLastUpdate, old_videoLink, old_androidLink, old_iosLink,
    old_instaLink, old_fbLink, old_website, old_rating, old_appIstalls, old_appsize, old_english, old_arabic, old_tags,
    old_description, new_english, new_arabic;

    nameOfApp += count; companyName += count; contactPerson += count; telcode_mobile += count; mobileNumber += count;
    telcode_whatsapp += count; whatsapp += count; email += count; category += count; dateOfLastUpdate += count;
    videoLink += count; androidLink += count; iosLink += count; instaLink += count; fbLink += count; website += count;
    rating += count; appIstalls += count; appsize += count; english += count; arabic += count; app_language += count;
    tags += count; description += count; update_app += count;

    old_nameOfApp += count; old_companyName += count; old_contactPerson += count; old_telcode_mobile += count;
    old_mobileNumber += count; old_telcode_whatsapp += count; old_whatsapp += count; old_email += count;
    old_category += count; old_dateOfLastUpdate += count; old_videoLink += count; old_androidLink += count;
    old_iosLink += count; old_instaLink += count; old_fbLink += count; old_website += count; old_rating += count;
    old_appIstalls += count; old_appsize += count; old_english += count; old_arabic += count; old_tags += count;
    old_description += count;

    btn_edit.hide();                                                                     
    btn_cancel.removeClass("display-none");

    main_row.after('<tr class="data-edit" id="editing_form'+ count +'"><td colspan="30">'+
    '<div id="cat-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<form>'+        
            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="nameOfApp">Name of the App <span class="text-danger"> <span class="text-danger">*</span></label>'+  
                    '<input type="text" id="nameOfApp'+ count +'" name="nameOfApp" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="Name of the App" autofocus>'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="companyName">Company Name <span class="text-danger">*</span></label>'+
                    '<input type="text" id="companyName'+ count +'" name="companyName" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="Company Name">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="contactPerson">Contact Person Name <span class="text-danger">*</span></label>'+
                    '<input type="text" id="contactPerson'+ count +'" name="contactPerson" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="Contact Person">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="mobileNumber">Mobile Number <span class="text-danger">*</span></label>'+
                    '<div class="flex">'+
                        '<div class="col-md-5 padding-0">'+
                            '<select id="telcode_mobile'+ count +'" name="telcode_mobile" onchange=clearError(this); class="form-control telCode">'+
                                '<option value="">-- Tel Code --</option>'+                                
                            '</select>'+                            
                            '<div class="required_error text-danger text-align-left bold-500"></div>'+
                        '</div>'+
                        '<div class="col-md-6 offset-md-1 padding-0">'+
                            '<input type="tel"" id="mobileNumber'+ count +'" name="mobileNumber" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="Mobile Number" required>'+
                            '<div class="required_error text-danger text-align-left bold-500"></div>'+
                        '</div>'+                        
                    '</div>'+
                '</div>'+

                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="whatsapp">WhatsApp Number</label>'+
                    '<div class="flex">'+
                        '<div class="col-md-5 padding-0">'+
                            '<select id="telcode_whatsapp'+ count +'" name="telcode_whatsapp" onchange=clearError(this); class="form-control telCode">'+
                                '<option value="">-- Tel Code --</option>'+                                
                            '</select>'+
                            '<div class="required_error text-danger text-align-left bold-500"></div>'+
                        '</div>'+
                        '<div class="col-md-6 offset-md-1 padding-0">'+
                            '<input type="tel"" id="whatsapp'+ count +'" name="whatsapp" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="WhatsApp Number">'+
                            '<div class="required_error text-danger text-align-left bold-500"></div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="email">E-Mail <span class="text-danger">*</span></label>'+
                    '<input type="email" name="email" id="email'+ count +'" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="E-Mail">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="category">Category of The App  <span class="text-danger">*</span></label>'+
                    '<select class="form-control" id="category'+ count +'"  onchange=clearError(this); name="category">'+
                        '<option value="">-- Select Category --</option>'+
                    '</select>'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="dateOfLastUpdate">Date of Last Update</label>'+
                    '<input type="date" id="dateOfLastUpdate'+ count +'" name="dateOfLastUpdate" value="" class="form-control">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="videoLink">Video Link</label>'+
                    '<input type="url" id="videoLink'+ count +'" name="videoLink" value="" class="form-control" placeholder="https://www.youtube.com/myvideo">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="androidLink">Android Link</label>'+
                    '<input type="url" id="androidLink'+ count +'" name="androidLink" value="" class="form-control" placeholder="https://www.playstore.com/myapp">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="iosLink">IOS Link</label>'+
                    '<input type="url" id="iosLink'+ count +'" name="iosLink" value="" class="form-control" placeholder="https://www.appstore.com/myapp">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="instaLink">Instagram Link</label>'+
                    '<input type="url" id="instaLink'+ count +'" name="instaLink" value="" class="form-control" placeholder="https://www.instagram.com/myapp">'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="fbLink">Facebook Link</label>'+
                    '<input type="url" id="fbLink'+ count +'" name="fbLink" value="" class="form-control" placeholder="https://www.facebook.com/myapp">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="website">Website</label>'+
                    '<input type="url" id="website'+ count +'" name="website" value="" class="form-control" placeholder="https://www.myapp.com">'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="rating">App Rating <span class="text-danger">*</span></label>'+
                    '<input type="text" id="rating'+ count +'" name="rating" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="3.5, 4.4, etc">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="appIstalls">Number of App Installs <span class="text-danger">*</span></label>'+
                    '<input type="number" id="appIstalls'+ count +'" name="appIstalls" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); class="form-control" placeholder="Number of App Installs">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="appsize">Size of The App(MB) <span class="text-danger">*</span></label>'+
                    '<input type="text" name="appsize" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); id="appsize'+ count +'" class="form-control" placeholder="Size in MB">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
                '<div class="form-group col-md-4">'+
                    '<label class="col-form-label" for="appLanguage">Languages in the App  <span class="text-danger">*</span></label>'+
                    '<div class="col-md-6 checkbox checkbox-blue">'+
                        '<div id="app_language'+ count +'">'+
                            '<span>'+
                                '<input id="english'+ count +'" name="english" onchange=clearErrorCheckBox(app_language'+count+'); value=1 type="checkbox" data-parsley-multiple="group1">'+
                                '<label for="english'+ count +'"> English </label>'+
                            '</span>&nbsp;&nbsp;&nbsp;&nbsp;'+
                            '<span>'+
                                '<input id="arabic'+ count +'" name="arabic" onchange=clearErrorCheckBox(app_language'+count+'); value=1 type="checkbox" data-parsley-multiple="group1">'+
                                '<label for="arabic'+ count +'"> Arabic </label>'+
                            '</span>'+
                        '</div>'+
                        '<div class="required_error text-danger text-align-left bold-500"></div>'+
                    '</div>'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+
            
            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="tags">Tags <span class="text-danger">*</span></label>'+
                    '<input type="text" id="tags'+ count +'" class="form-control" name = "tags" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); data-role="tagsinput">'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+
            '<script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>'+

            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_app'+ count +'" class="btn btn-success waves-effect waves-light btn-update-category" value="Update App">'+
                    '</a> &nbsp;&nbsp;&nbsp;'+
                    '<input type="reset" class="btn btn-danger" value="Cancel">'+
                '</div>'+
            '</div>'+
        '</form>'+
    '</td></tr>');

    $.ajax({
        url: "http://localhost/qapp/admin/manage_app_ajax",
        method: 'POST',
        dataType: 'json',
        data: { app_id: appId, table: 'app' },
        success:function(res){
            if(res.response == 'success'){
                $(nameOfApp).val(res.app_data.app_name); old_nameOfApp = res.app_data.app_name;
                $(companyName).val(res.app_data.company_name); old_companyName = res.app_data.company_name
                $(contactPerson).val(res.app_data.contact_person); old_contactPerson = res.app_data.contact_person
                $(mobileNumber).val(res.app_data.mobile); old_mobileNumber = res.app_data.mobile;
                $(whatsapp).val(res.app_data.whatsapp); old_whatsapp = res.app_data.whatsapp;
                $(email).val(res.app_data.email); old_email = res.app_data.email;
                $(category).val(res.app_data.category); old_category = res.app_data.category;
                $(dateOfLastUpdate).val(res.app_data.last_update); old_dateOfLastUpdate = res.app_data.last_update;
                $(videoLink).val(res.app_data.video_link); old_videoLink = res.app_data.video_link;                
                $(androidLink).val(res.app_data.android_link); old_androidLink = res.app_data.android_link;
                $(iosLink).val(res.app_data.ios_link); old_iosLink = res.app_data.ios_link;
                $(instaLink).val(res.app_data.instagram_link); old_instaLink = res.app_data.instagram_link;
                $(fbLink).val(res.app_data.facebook_link); old_fbLink = res.app_data.facebook_link;                
                $(website).val(res.app_data.website); old_website = res.app_data.website;
                $(rating).val(res.app_data.app_rating); old_rating = res.app_data.app_rating;
                $(appIstalls).val(res.app_data.app_installs); old_appIstalls = res.app_data.app_installs;
                $(appsize).val(res.app_data.app_size); old_appsize = res.app_data.app_size;
                //$(tags).val(res.app_data.tags); old_tags = res.app_data.tags;
                // $('#NEWTAG').val(res.app_data.tags).trigger('change');
                $(tags).tagsinput('add', res.app_data.tags); old_tags = res.app_data.tags;
                // setTimeout(function(){$(tags).val(res.app_data.tags).trigger('change'); alert(res.app_data.tags); }, 4000);
                old_telcode_mobile = res.app_data.telcode_mobile; old_telcode_whatsapp = res.app_data.telcode_whatsapp;

                if(res.app_data.english == 1) {
                    $(english).attr("checked", "checked");
                    old_english = 1;
                }
                else old_english = 0;
                if(res.app_data.arabic == 1) {
                    $(arabic).attr("checked", "checked");
                    old_arabic = 1;
                }
                else old_arabic = 0;

                for(i = 0; i < telObj.length; i++) {
                    let country_name, dial_code, code;
                    country_name = telObj[i]['name'];
                    dial_code = telObj[i]['dial_code'];
                    code = telObj[i]['code'];
                    if(res.app_data.telcode_mobile == dial_code) {
                        $(telcode_mobile).append("<option value='"+dial_code+"' selected>"+country_name+" ("+code+") "+dial_code+"</option>");
                    }
                    else $(telcode_mobile).append("<option value='"+dial_code+"'>"+country_name+" ("+code+") "+dial_code+"</option>");
                }

                for(i = 0; i < telObj.length; i++) {
                    let country_name, dial_code, code;
                    country_name = telObj[i]['name'];
                    dial_code = telObj[i]['dial_code'];
                    code = telObj[i]['code'];
                    if(res.app_data.telcode_whatsapp == dial_code) {
                        $(telcode_whatsapp).append("<option value='"+dial_code+"' selected>"+country_name+" ("+code+") "+dial_code+"</option>");
                    }
                    else $(telcode_whatsapp).append("<option value='"+dial_code+"'>"+country_name+" ("+code+") "+dial_code+"</option>");
                }

                for(i = 0; i < res.cat_data.length; i++) {
                    myObj = res.cat_data[i];
                    if(myObj.enable_disable == 1) {
                        if(res.app_data.category == myObj.cat_id)
                            $(category).append("<option value='"+myObj.cat_id+"' selected>"+myObj.name+"</option>");
                        else $(category).append("<option value='"+myObj.cat_id+"'>"+myObj.name+"</option>");
                    }                    
                }
            }
        }
    });

    $(nameOfApp).focus();
    
    $(update_app).click(function() {
        let myform = $(this).parents(".data-edit");        
        let duplicate_status = 0;
        $(".required_error").text("");

        if($(english+':checkbox:checked').length > 0) new_english = 1;
        else new_english = 0;
        if($(arabic+':checkbox:checked').length > 0) new_arabic = 1;
        else new_arabic = 0;
        
        if(($(companyName).val() == old_companyName && $(contactPerson).val() == old_contactPerson && $(telcode_mobile).val() == old_telcode_mobile && $(mobileNumber).val() == old_mobileNumber && $(telcode_whatsapp).val() == old_telcode_whatsapp && $(whatsapp).val() == old_whatsapp && $(email).val() == old_email && $(category).val() == old_category && $(dateOfLastUpdate).val() == old_dateOfLastUpdate && $(videoLink).val() == old_videoLink && $(androidLink).val() == old_androidLink && $(iosLink).val() == old_iosLink && $(instaLink).val() == old_instaLink && $(fbLink).val() == old_fbLink && $(website).val() == old_website && $(rating).val() == old_rating && $(appIstalls).val() == old_appIstalls && $(rating).val() == old_rating && $(appIstalls).val() == old_appIstalls && $(appsize).val() == old_appsize && $(tags).val() == old_tags && new_english == old_english) || $(nameOfApp).val() != old_nameOfApp) {
            
            $.ajax({
                url: "http://localhost/qapp/admin/check_duplicate_ajax",
                method: 'POST',
                dataType: 'json',
                data: { table: 'app', field: 'app_name', value: $(nameOfApp).val() },
                success:function(res) {
                    if(res.duplicate == 'yes') {
                        $(nameOfApp).next().text("App name must be unique.");
                        duplicate_status = 1;
                    }
                }
            });
        }

        //let phoneno = /^\d{8}$/;
        
        if($(nameOfApp).val() == '' || $(companyName).val() == '' || $(contactPerson).val() == '' || $(telcode_mobile).val() == '' || $(mobileNumber).val() == '' || $(email).val() == '' || $(category).val() == '' || $(rating).val() == '' || (new_english == 0 && new_arabic == 0) || $(appIstalls).val() == '' || $(appsize).val() == '' || $(tags).val() == '') {
            if($(nameOfApp).val() == '') $(nameOfApp).next().text("Please enter App Name.");
            if($(companyName).val() == '') $(companyName).next().text("Please enter Company Name.");
            if($(contactPerson).val() == '') $(contactPerson).next().text("Please enter Contact Person.");
            if($(telcode_mobile).val() == '') $(telcode_mobile).next().text("Please select Tel Code.");
            if($(mobileNumber).val() == '') $(mobileNumber).next().text("Please enter Mobile Number.");
            if($(email).val() == '') $(email).next().text("Please enter E-Mail.");            
            if($(category).val() == '') $(category).next().text("Please select App Category.");
            if($(rating).val() == '') $(rating).next().text("Please enter App Rating.");
            if(new_english == 0 && new_arabic == 0) $(app_language).next().text("Please select Language.");
            if($(appIstalls).val() == '') $(appIstalls).next().text("Please enter Number of App Installs.");
            if($(appsize).val() == '') $(appsize).next().text("Please enter Size of the App.");
            if($(tags).val() == '') $(tags).next().text("Please enter Tags.");
        }
        //alert($(nameOfApp).val()+" "+old_nameOfApp);
        if($(telcode_whatsapp).val() != '' && $(whatsapp).val() == '')
            $(whatsapp).next().text("Please enter WhatsApp Number, or reset the tel code if you don't want to fill WhatsApp Number.");
        if($(whatsapp).val() != '' && $(telcode_whatsapp).val() == '')
            $(telcode_whatsapp).next().text("Please select Tel Code.");

        else {
            setTimeout(function() {
                if(duplicate_status == 0) {
                    $.ajax({
                        url: "http://localhost/qapp/admin/update_app_ajax",
                        method: 'POST',
                        dataType: 'json',
                        data: { table: 'app', id: 'app_id', app_id: appId, app_name: $(nameOfApp).val(), company_name: $(companyName).val(), contact_person: $(contactPerson).val(), telcode_mobile:  $(telcode_mobile).val(), mobile: $(mobileNumber).val(), telcode_whatsapp: $(telcode_whatsapp).val() , whatsapp: $(whatsapp).val() , email: $(email).val() , category: $(category).val() , last_update: $(dateOfLastUpdate).val() , video_link: $(videoLink).val() , android_link: $(androidLink).val(), ios_link: $(iosLink).val() , instagram_link: $(instaLink).val(), facebook_link: $(fbLink).val(), website: $(website).val() , app_rating: $(rating).val() , app_installs: $(appIstalls).val(), english: new_english, arabic: new_arabic, tags: $(tags).val(), sr_num: srNum },
                        success:function(res) {
                            if(res.response == 'success') {
                                myform.prev().html(res.table_data);
                                myform.remove(".data-edit");
                            }
                            else {                                
                                myform.find(".alert").hide();
                                myform.find(".alert").addClass("alert-danger");
                                myform.find(".alert").removeClass("display-none");
                                myform.find(".alert").html("<b>Failed</b>! Home slider not updated");
                                $(nameOfApp).focus();
                                myform.find(".alert").fadeTo(2000, 500).slideUp(1000);                                
                            }
                        }
                    });                                
                }
            }, 300);
        }

        // if(!('mobileNumber'+count.value.match(phoneno))) $(mobileNumber).next().text("Please enter 8 digit Mobile Number with correct format.");
        // if(!('whatsapp'+count.value.match(phoneno))) $(whatsapp).next().text("Please enter 8 digit WhatsApp Number with correct format.");
    });

    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        main_row.find(".edit_des").removeClass("disabled");
        main_row.find(".edit_screenshots").removeClass("disabled");
        btn_edit.show();
    });
}

function my_app_edit(button) {    
    const appId = button.getAttribute("data-row-id");
    const srNum = button.getAttribute("data-sr-num");
    edit_app(appId, srNum, $(button));
}
///////////////////////////////// END OF EDIT APP BASIC DETAILS /////////////////////////////////////


////////////////////////////////// END OF EDIT APP DESCRIPTION //////////////////////////////////////
function edit_app_des(appId, srNum, button) {
    count++;    
    const optn_edit = button;
    const main_row = button.parents("tr");
    const btn_group = button.parents(".btn-group");    
    const btn_cancel = $(btn_group).children("button.btn-cancel");
    const btn_edit = $(btn_group).children("button.btn-edit");
    
    $(btn_edit).hide();
    btn_cancel.removeClass("display-none");
    optn_edit.addClass("disabled");
    main_row.find(".edit_screenshots").addClass("disabled");

    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        optn_edit.removeClass("disabled");
        main_row.find(".edit_screenshots").removeClass("disabled");
        $(this).prev().show();
    });

    let description = "#description";
    let update_description = "#update_description";
    description += count;
    update_description += count;

    main_row.after('<tr class="data-edit"><td colspan="30" class="data-edit">'+
        '<div id="home-slider-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<form action = "" >'+
            '<div class="form-row">'+
                '<div class="form-group col-md-12">'+
                    '<label class="col-form-label" for="description">App Description <span class="text-danger">*</span></label>'+
                    '<textarea name="description" id="description'+ count +'" name="description" cols="30" value="" onchange=clearError(this); onpaste=clearError(this); onkeypress=clearError(this); rows="5" class="form-control" placeholder="App Description"></textarea>'+
                    '<div class="required_error text-danger text-align-left bold-500"></div>'+
                '</div>'+
            '</div>'+
            
            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_description'+count+'" class="btn btn-success waves-effect waves-light btn-update-home-slider" value="Update Description">'+
                    '</a> &nbsp;&nbsp;&nbsp;'+
                    '<input type="reset" class="btn btn-danger" value="Cancel">'+
                '</div>'+
            '</div>'+
        '</form>'+
        '</td></tr>');

    $.ajax({
        url: "http://localhost/qapp/admin/manage_app_description_ajax",
        method: 'POST',
        dataType: 'json',
        data: { app_id: appId, table: 'app' },
        success:function(res) {
            if(res.response == 'success'){
                $(description).val(res.app_data.description);
            }
        }
    });

    $(description).focus();

    $(update_description).click(function() {
        
        let myform = $(this).parents(".data-edit");
        $(description).next().text("");
        
        if($(description).val() == '') {
            $(description).next().text("Please enter App Description.");
        }
        else {
            setTimeout(function() {
                $.ajax({
                    url: "http://localhost/qapp/admin/update_app_des_ajax",
                    method: 'POST',
                    dataType: 'json',
                    data: { table: 'app', id: 'app_id ', app_id: appId, description: $(description).val() },
                    success:function(res) {
                        if(res.response == 'success') {                          
                            myform.prev().find(".single_refresh").text($(description).val());
                            btn_cancel.addClass("display-none");
                            $(btn_edit).show();
                            optn_edit.removeClass("disabled");                            
                            myform.remove(".data-edit");
                        }
                        else {
                            myform.find(".alert").hide();
                            myform.find(".alert").addClass("alert-danger");
                            myform.find(".alert").removeClass("display-none");
                            myform.find(".alert").html("<b>Failed</b>! App Description not updated");
                            $(title).focus();
                            myform.find(".alert").fadeTo(2000, 500).slideUp(1000);
                        }
                    }
                });            
            }, 300);
        }
    });
}

function my_app_edit_des(button) {    
    const appId = button.getAttribute("data-row-id");
    const srNum = button.getAttribute("data-sr-num");
    edit_app_des(appId, srNum, $(button));
}
///////////////////////////////// END OF EDIT APP DESCRIPTION ///////////////////////////////////////


///////////////////////////////// END OF EDIT APP SCREENSHOTS ///////////////////////////////////////
function edit_app_screenshots(appId, button) {
    count++; imgRow++;
    const optn_edit = button;
    const main_row = button.parents("tr");
    const btn_group = button.parents(".btn-group");    
    const btn_cancel = $(btn_group).children("button.btn-cancel");
    const btn_edit = $(btn_group).children("button.btn-edit");
    
    $(btn_edit).hide();
    btn_cancel.removeClass("display-none");
    optn_edit.addClass("disabled");
    main_row.find(".edit_des").addClass("disabled");

    btn_cancel.click(function() {
        main_row.next().remove(".data-edit");
        $(this).addClass("display-none");
        optn_edit.removeClass("disabled");
        main_row.find(".edit_des").removeClass("disabled");
        $(this).prev().show();
    });

    let appScreens = "#appScreens";
    appScreens += count;

    main_row.after('<tr class="data-edit"><td colspan="30" class="data-edit">'+
        '<div id="home-slider-edit-form-alert'+ count +'" class="alert alert-dismissible fade show col-md-6 update-status display-none" role="alert"></div>'+
        '<h1>Edit App Screens</h1>'+
        '<form action = "" >'+
            '<div id="appScreens'+ count +'">'+
                '<div class="row text-align-center img-row" id="img-row'+ imgRow +'"> </div>'+
            '</div>'+
            
            '<div class="form-row">'+
                '<div class="form-group col-md-6">'+
                    '<input type = "button" name = "submit" id="update_description'+count+'" class="btn btn-success waves-effect waves-light btn-update-home-slider" value="Update Description">'+
                    '</a> &nbsp;&nbsp;&nbsp;'+
                    '<input type="reset" class="btn btn-danger" value="Cancel">'+
                '</div>'+
            '</div>'+
        '</form>'+
        '</td></tr>');

    $.ajax({
        url: "http://localhost/qapp/admin/manage_app_screens_ajax",
        method: 'POST',
        dataType: 'json',
        data: { app_id: appId, table: 'screenshots' },
        success:function(res) {
            if(res.response == 'success'){
                let myObj;
                let x = 0;
                for(i = 0; i < res.app_screen_data.length; i++) {
                    x++;
                    myObj = res.app_screen_data[i];
                    if(x <= 3) {
                        $('#img-row'+ imgRow +'').append("<div class='col-md-4'><img src='././upload/app_screenshots/"+myObj.image+"'></div>");
                    }
                    else {
                        $('#img-row'+ imgRow +'').after('<div class="row text-align-center img-row" id="img-row'+ (++imgRow) +'"> </div>');
                        x = 0; i--;
                    }
                }
            }
        }
    });

    // $(description).focus();

    // $(update_description).click(function() {
        
    //     let myform = $(this).parents(".data-edit");
    //     $(description).next().text("");
        
    //     if($(description).val() == '') {
    //         $(description).next().text("Please enter App Description.");
    //     }
    //     else {
    //         setTimeout(function() {
    //             $.ajax({
    //                 url: "http://localhost/qapp/admin/update_app_des_ajax",
    //                 method: 'POST',
    //                 dataType: 'json',
    //                 data: { table: 'app', id: 'app_id ', app_id: appId, description: $(description).val() },
    //                 success:function(res) {
    //                     if(res.response == 'success') {                          
    //                         myform.prev().find(".single_refresh").text($(description).val());
    //                         btn_cancel.addClass("display-none");
    //                         $(btn_edit).show();
    //                         optn_edit.removeClass("disabled");                            
    //                         myform.remove(".data-edit");
    //                     }
    //                     else {
    //                         myform.find(".alert").hide();
    //                         myform.find(".alert").addClass("alert-danger");
    //                         myform.find(".alert").removeClass("display-none");
    //                         myform.find(".alert").html("<b>Failed</b>! App Description not updated");
    //                         $(title).focus();
    //                         myform.find(".alert").fadeTo(2000, 500).slideUp(1000);
    //                     }
    //                 }
    //             });            
    //         }, 300);
    //     }
    // });
}

function my_app_edit_screenshots(button) {    
    const appId = button.getAttribute("data-row-id");
    edit_app_screenshots(appId, $(button));
}
///////////////////////////////// END OF EDIT APP SCREENSHOTS ///////////////////////////////////////


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


////////////////////////////////// COMMON MODAL FOR ADD NEW IMAGE //////////////////////////////////
function new_image_data(button) {
    const recordId = button.getAttribute("data-row-id");
    const tableName = button.getAttribute("data-table-name");
    const idField = button.getAttribute("data-table-id-field");
    const imageField = button.getAttribute("data-table-image-field");
    const imgPath = button.getAttribute("data-img-path");

    //alert(recordId+", "+tableName+", "+idField+", "+imageField+", "+imgPath);
    
    selected_row = $(button).parents(".record-row");
    
    $("#new_image").find(".hidden_image_row_id").val(recordId);
    $("#new_image").find(".hidden_image_table_name").val(tableName);
    $("#new_image").find(".hidden_imageId_field_name").val(idField);
    $("#new_image").find(".hidden_image_field_name").val(imageField);
    $("#new_image").find(".hidden_image_path").val(imgPath);
}
//////////////////////////// END OF COMMON MODAL FOR ADD NEW IMAGE /////////////////////////////////


////////////////////////////////////// COMMON CHANGE IMAGE /////////////////////////////////////////
function add_new_image_process() {    
    const recordId = $("#new_image").find(".hidden_image_row_id").val();
    const tableName = $("#new_image").find(".hidden_image_table_name").val();
    const idField = $("#new_image").find(".hidden_imageId_field_name").val();
    const imageFieldName = $("#new_image").find(".hidden_image_field_name").val();
    const imgPath = $("#new_image").find(".hidden_image_path").val();
    const newImage = $('#text_new_image')[0];
    
    let fd = new FormData();
    
    if(newImage.files.length > 0 ) {
        fd.append('table', tableName);
        fd.append('id', idField);
        fd.append('record_id', recordId);
        fd.append('image_field', imageFieldName);
        fd.append('folderPath', imgPath);
        $.each(newImage.files, function(k, file){
            fd.append('imageFile[]', file);
        });

        $.ajax({
            url: "http://localhost/qapp/admin/add_new_image_ajax",
            type: 'post',
            dataType: 'json',
            data: fd,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.response == "success") {
                    $("#new_image").modal("toggle");
                    $("#success_modal").modal("toggle");
                    $("#success_modal").find("h1").text("Success!");
                    $("#success_modal").find("p").text("Images has been uploaded.");
                    $("#text_new_image").val("");
                }
                else{
                    $('#failed_modal').modal('toggle');
                }
            },
        });
    }
    else {
        $("#new_image").find(".required_error").text("Please select at least one file.");
    }
}
///////////////////////////////// END OF COMMON CHANGE IMAGE ////////////////////////////////////////


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
function clearFields(field) {
    $(field).find(".file-field").val("");
    $(field).find(".required_error").text("");
}
////////////END OF CLEAR INPUT TYPE FILE AND REQUIRED ERROR WHEN CLICK ON CANCEL BUTTON ////////////