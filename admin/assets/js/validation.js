/////////////////////////////// INPUT VALIDATION ON FOCUS OUT //////////////////////////////////////
$(".my-field-alpha-space").focusout(function(){
    let isValid = false;
    let regex = /^[a-zA-Z ]*$/;
    isValid = regex.test($(this).val());
    if(!isValid) {
        $(this).next(".required_error").text("Only alphabetic characters and spaces are allowed.");
    }
    else {
        $(this).next(".required_error").text("");
    }
});

$(".my-field-alpha-num-space").focusout(function(){
    let isValid = false;
    let regex = /^[a-zA-Z0-9 ]*$/;
    isValid = regex.test($(this).val());
    if(!isValid) {
        $(this).next(".required_error").text("Only alpha-numeric characters and spaces are allowed.");
    }
    else {
        $(this).next(".required_error").text("");
    }
});

$(".my-field-natural").focusout(function(){
    let isValid = false;
    let regex = /^[0-9]*$/;
    isValid = regex.test($(this).val());
    if(!isValid) {
        $(this).next(".required_error").text("Only digits are allowed.");
    }
    else {
        $(this).next(".required_error").text("");
    }
});

$(".my-field-num-plus").focusout(function(){
    let isValid = false;
    let regex = /^[0-9+,]*$/;
    isValid = regex.test($(this).val());
    if(!isValid) {
        $(this).next(".required_error").text("Only numeric and ' + , ' symboles are allowed.");
    }
    else {
        $(this).next(".required_error").text("");
    }
});

$(".my-field-num-point").focusout(function(){
    let isValid = false;
    let regex = /^[0-9.]*$/;
    isValid = regex.test($(this).val());
    if(!isValid) {
        $(this).next(".required_error").text("Only numerical value is allowed (Eg- 10, 45, 10.2, 18.5)");
    }
    else {
        $(this).next(".required_error").text("");
    }
});
/////////////////////////// END OF CLEAR INPUT VALIDATION ON FOCUS OUT /////////////////////////////