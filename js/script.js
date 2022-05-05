var MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = '0px'
function menutoggle() {
    if (MenuItems.style.maxHeight == '0px') {
        MenuItems.style.maxHeight = '200px'
    }
    else {
        MenuItems.style.maxHeight = '0px'
    }
}
// js for toggle menu 

var MenuItems = document.getElementById("MenuItems");
MenuItems.style.maxHeight = '0px'
function menutoggle() {
    if (MenuItems.style.maxHeight == '0px') {
        MenuItems.style.maxHeight = '200px'
    }
    else {
        MenuItems.style.maxHeight = '0px'
    }
}
//js for search bar 
$(document).ready(function () {
    $('.icon').click(function () {
        $('.search').toggleClass('active')

    })
})
// js for toggle form
var LoginForm = document.getElementById("LoginForm");
var RegForm = document.getElementById("RegForm");
var Indicator = document.getElementById("Indicator");

function reg() {
    RegForm.style.transform = "translateX(0px)";
    LoginForm.style.transform = "translateX(0px)";
    Indicator.style.transform = "translateX(100px)";
}
function login() {
    RegForm.style.transform = "translateX(300px)"
    LoginForm.style.transform = "translateX(300px)"
    Indicator.style.transform = "translateX(0px)"
}
function sendMsg() {
    var name = jQuery('#name').val();
    var email = jQuery('#email').val();
    var number = jQuery('#number').val();
    var EnquiryTopic = jQuery('#EnquiryTopic').val();
    var message = jQuery('#message').val();

    //    var is_error = '';
    if (name == '') {
        alert('please enter name');
    }
    else if (email == '') {
        alert('please enter email');
    }
    else if (number == '') {
        alert('please enter number');
    }
    else if (EnquiryTopic == '') {
        alert('please enter EnquiryTopic');
    }
    else if (message == '') {
        alert('please enter message');
    } else {
        jQuery.ajax({
            url: 'send_message.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&number=' + number + '&EnquiryTopic=' + EnquiryTopic + '&message=' + message,
            success: function (result) {
                alert('message sent');
            }
        })
    }
}
function userReg() {
    jQuery('.field_error').html('');
    var name = jQuery('#reg_username').val();
    var email = jQuery('#reg_email').val();
    var password = jQuery('#reg_password').val();
    var is_error = '';
    if (name == '') {
        jQuery('#reg_username_error').html('Please enter name');
        is_error = 'yes';
    }
    if (email == '') {
        jQuery('#reg_email_error').html('Please enter email');
        is_error = 'yes';
    }
    if (password == '') {
        jQuery('#reg_password_error').html('Please enter password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            url: 'user_register.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&password=' + password,
            success: function (result) {
                if (result == 'email present') {
                    console.log(result);
                    jQuery('#reg_email_error').html('email already exists');
                }
                if (result == 'insert') {
                    jQuery('.register_msg').html('Thanku for registering');
                }
            }
        })
    }
}
function userLogin() {
    jQuery('.field_error').html('');
    var name = jQuery('#login_username').val();
    var password = jQuery('#login_password').val();
    var is_error = '';
    if (name == '') {
        jQuery('#login_username_error').html('Please enter name');
        is_error = 'yes';
    }
    if (password == '') {
        jQuery('#login_password_error').html('Please enter password');
        is_error = 'yes';
    }
    if (is_error == '') {
        jQuery.ajax({
            url: 'user_login.php',
            type: 'post',
            data: 'name=' + name + '&password=' + password,
            success: function (result) {
                if (result == 'wrong') {
                    jQuery('.login_msg').html('Please enter correct details');

                }
                if (result == 'valid') {
                    window.location.href = window.location.href;
                }
            }
        })
    }
}

function manage_cart(pid, type) {
    if (type == 'update') {
        var qty = jQuery("#" + pid + "qty").val();
    } else {
        var qty = jQuery('#qty').val();
    }
    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function (result) {
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;

            } if (result == 'not_available') {
                alert('we dont have that much stock');
                die();
            } else {
                jQuery('.total').html(result);
            }


        }

    })

}
