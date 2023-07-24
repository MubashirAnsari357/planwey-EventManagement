$(document).ready(function() {
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
            guest: {
                required: true,
                min: 50,
                max: 2000
            },
            zip: {
                required: true,
                minlength: 6,
                maxlength: 6
            },
            event: {
                required: true,
                minlength: 3
            },
            property: {
                required: true,
                minlength: 3
            },
            package: {
                required: true,
                minlength: 2
            },
            date: {
                required: true,
            },
            time: {
                required: true,
            },
            comment: {
                required: true,
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
            zip: {
                required: "Please Enter Your Postcode/Zip.",
                minlength: "Enter Your Postcode/Zip only",
                maxlength: "Enter Your Postcode/Zip only",
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
            guest: {
                required: "Please enter number of guest",
                min: "number of guest at least 50",
                max: "Number of guest not more than 2000"
            },
            event: {
                required: "Please Enter Event Name",
                minlength: "Your event name must consist of at least 3 characters"
            },
            property: {
                required: "Please Enter Property Name",
                minlength: "Your Property name must consist of at least 3 characters"
            },
            package: {
                required: "Please Enter Package Name",
                minlength: "Your pacakge name must consist of at least 2 characters"
            },
            date: {
                required: "Please enter valid date",
            },
            time: {
                required: "Select time"
            },
            comment: {
                required: "Please Enter your feedback"
            },

            email: "Please enter a valid email address",

            gender: "Please Select Gender"


        }

    });
});