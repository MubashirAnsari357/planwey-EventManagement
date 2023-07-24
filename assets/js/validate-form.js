$(document).ready(function () {

    $("#contactform").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            dob: {
                required: true,
            },
            address: {
                required: true,
            },
            stt: {
                required: true,
            },
            city: {
                required: true,
            },
            password: {
                required: true,
                minlength: 6
            },
            old_password: {
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            gender: "required",


        },
        messages: {
            
            name: {
                required: "Please Enter Name",
                minlength: "Your name must consist of at least 3 characters"
            },
            dob: {
                required: "Please Choose DOB"
            },
            address: {
                required: "Please Enter Address"
            },
            stt: {
                required: "Please Select State"
            },
            city: {
                required: "Please Select City"
            },
            phone: {
                required: "Please Enter Your Mobile no.",
                minlength: "Enter Your 10 digit Mobile no. only",
                maxlength: "Enter Your 10 digit Mobile no. only",
            },

            password: {
                required: "Please Enter Password",
                minlength: "Your password must be at least 6 characters long"
            },
            old_password: {
                required: "Please Enter Old Password",
                minlength: "Your password must be at least 6 characters long"
            },
            confirm_password: {
                required: "Please Confirm Password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",

            gender: "Please Select Gender"


        }

    });
    $("#myform").validate({
        rules: {
            u_id: "required",
        },
        messages: {
            u_id: "Please Enter ID"
        },
    })

});