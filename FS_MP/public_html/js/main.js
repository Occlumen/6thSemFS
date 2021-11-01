$(document).ready(function(){
     var DOMAIN = "http://localhost/FS_MP/public_html";

     $("#register_form").on("submit",function()
     {
         var status = false;
         var name = $("#username");
         var email = $("#email");
         var pass1 = $("#password1");
         var pass2 = $("#password2");
         var type = $("#employeetype");
         var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

         if(name.val() == "" || name.val().length < 6)
         {
             name.addClass("border-danger");
             $("#u_error").html("<span class='text-danger'>Please Enter Name (should be more than 6 characters) </span>");
             status = false;
         }
         else{
             name.removeClass("border-danger");
             $("#u_error").html("");
             status = true;
         }


         if (!e_patt.test(email.val())) {
             email.addClass("border-danger");
             $("#e_error").html("<span class='text-danger'>Please Enter Valid Email Address </span>");
             status = false;
         }
         else {
             email.removeClass("border-danger");
             $("#e_error").html("");
             status = true;
         }

         if (pass1.val() == "" || pass1.val().length <6) {
             pass1.addClass("border-danger");
             $("#p1_error").html("<span class='text-danger'>Please Enter bigger password </span>");
             status = false;
         }
         else {
             pass1.removeClass("border-danger");
             $("#p1_error").html("");
             status = true;
         }

         if (pass2.val() == "" || pass2.val().length < 9) {
             pass2.addClass("border-danger");
             $("#p2_error").html("<span class='text-danger'>Please Enter more than 9 digit password </span>");
             status = false;
         }
         else {
             pass2.removeClass("border-danger");
             $("#p2_error").html("");
             status = true;
         }

         if (type.val() == "") {
             type.addClass("border-danger");
             $("#t_error").html("");
             status = false;
         }
         else {
             type.removeClass("border-danger");
             $("#t_error").html("");
             status = true;
         }
         if ((pass1.val() == pass2.val()) && status == true)
         {
             $.ajax({
                 url : DOMAIN+"/includes/process.php",
                 method : "POST",
                 data : $("#register_form").serialize(),
                 success : function(data){
                     if (data == "EMAIL_ALREADY_EXISTS") {
                         alert("It seems like your email is already present");
                     }
                     else if (data == "SOME_ERROR") {
                         alert("Something is Wrong");
                     } else {
                         window.location.href = encodeURI(DOMAIN + "/index.php?msg=You are registered Now you can login");
                     }
                 },
             })
         }
         else
         {
             pass2.addClass("border-danger");
             $("#p2_error").html("<span class='text-danger'>Password is not matched</span> ");
             status = true;
         }
     })


     //For Login Part

$("#login_form").on("submit",function(){
         var email = $("#log_email");
         var pass = $("#log_password");
         var status = false;
         if (email.val() == "")
         {
             email.addClass("border-danger");
             $("#e_error").html("<span class='text-danger'>Please Enter Email Address</span> ");
             status = false;
         }
         else
         {
             email.removeClass("border-danger");
             $("#e_error").html("");
             status = true;
         }



         if (pass.val() == "") {
             pass.addClass("border-danger");
             $("#p_error").html("<span class='text-danger'>Please Enter Password</span> ");
             status = false;
         }
         else {
             pass.removeClass("border-danger");
             $("#p_error").html("");
             status = true;
         }
         if(status)
         {
             $.ajax({
                 url: DOMAIN +"/includes/process.php",
                 method: "POST",
                 data: $("#login_form").serialize(),
                 success: function (data) {
                     if (data == "NOT_REGISTERED") {
                         alert("It seems like you are not registered");
                         email.addClass("border-danger");
                         $("#e_error").html("<span class='text-danger'>Please It seems like you have not registered. </span>");
                         status = false;
                     }
                     else if (data == "PASSWORD_NOT_MATCHED") {
                         alert("Something is Wrong");
                         pass.addClass("border-danger");
                         $("#p_error").html("<span class='text-danger'>Please Enter Correct Password</span> ");
                         status = false;
                     } else {
                         console.log(data);
                         window.location.href = encodeURI(DOMAIN + "/dashboard.php");
                     }
                 }
             })
         }
     })




fetch_category();
    function fetch_category(){
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getCategory:1},
            success : function(data)
            {
                var root = "<option value='0'>Main Menu</option>";
                var choose = "<option value=''>Choose Menu</option>";
                $("#parent_cat").html(root+data);
                $("#select_cat").html(choose+data);
            }
        })
    }



    fetch_brand();
    function fetch_brand() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { getBrand: 1 },
            success: function (data) {
                var choose = "<option value=''>Choose Distributer</option>";
                $("#select_brand").html(choose + data);
            }
        })
    }


    $("#category_form").on("submit", function () {
        if ($("#category_name").val() == "") {
            $("#category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Menu Item</span> ");
        }
        else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#category_form").serialize(),
                success: function (data) {
                    if (data == "CAREGORY_ADDED") {
                        $("#category_name").removeClass("border-danger");
                        $("#cat_error").html("<span class='text-success'>New Category Added. </span>");
                        $("#category_name").val("");
                        fetch_category();

                    }
                    else {
                        alert(data);
                    }
                }
            })   
        }
    })



    $("#brand_form").on("submit", function () {
        if ($("#brand_name").val() == "") {
            $("#brand_name").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter Stock List</span> ");
        }
        else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#brand_form").serialize(),
                success: function (data) {
                    if (data == "BRAND_ADDED") {
                        $("#brand_name").removeClass("border-danger");
                        $("#brand_error").html("<span class='text-success'>New Stock Added. </span>");
                        $("#brand_name").val("");
                        fetch_brand();

                    }
                    else {
                        alert(data);
                    }
                }
            })
        }
    })




    $("#product_form").on("submit", function () {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#product_form").serialize(),
                success: function (data) {
                    if (data == "PRODUCT_ADDED") {
                        alert("New Product Added");
                        $("#added_date").val("");
                        $("#product_name").val("");
                        $("#select_cat").val("");
                        $("#select_brand").val("");
                        $("#product_price").val("");
                        $("#product_qty").val("");
                    }
                    else {
                        console.log(data);
                        alert(data);
                    }
                }
            })
        
    })

})