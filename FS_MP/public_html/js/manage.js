$(document).ready(function () {
    var DOMAIN = "http://localhost/FS_MP/public_html";


    manageCategory(1);
    function manageCategory(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { manageCategory: 1,pageno:pn },
            success: function (data) {
                $("#get_category").html(data);
            }
        })
    }

    
    $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        manageCategory(pn);
    })


    $("body").delegate(".del_cat", "click", function () {
        var did = $(this).attr("did");
        if(confirm("Are you sure you want to delete?"))
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: { deleteCategory: 1,id:did},
                success: function (data) {
                    if (data == "DEPENDENT_CATEGORY") {
                        alert("Sorry!! This category is dependent");
                    }
                    else if (data == "CATEGORY_DELETED"){
                        alert("DELETED SUCCESSFULLY");
                        manageCategory(1);
                    }
                    else if (data == "DELETED")
                    {
                        alert("DELETED SUCCESSFULLY");
                    }
                    else
                    {
                        alert(data);
                    }
                }
            })
        }
        else{
        
        }
    })



    fetch_category();
    function fetch_category() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { getCategory: 1 },
            success: function (data) {
                var root = "<option value='0'>Main Menu</option>";
                var choose = "<option value=''>Choose</option>";
                $("#parent_cat").html(root + data);
                $("#select_cat").html(choose + data);
            
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


    $("body").delegate(".edit_cat", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType :"json",
            data: { updateCategory: 1, id:eid },
            success: function (data) {
                    console.log(data);
                    $("#cid").val(data["cid"]);
                    $("#update_cat").val(data["category_name"]);
                    $("#parent_cat").val(data["parent_cat"]);
                
            }
        })
    
    })



    $("#update_category_form").on("submit", function () {
        if ($("#update_cat").val() == "") {
            $("#update_cat").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Menu Item</span> ");
        }
        else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_category_form").serialize(),
                success: function (data) {
                    alert(data);
                    window.location.href = "";
                }
            })
        }
    })



    manageBrand(1);
    function manageBrand(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { manageBrand: 1, pageno: pn },
            success: function (data) {
                $("#get_brand").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageBrand(pn);
    })





    $("body").delegate(".del_brand", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: { deleteBrand: 1, id:did },
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Brand is deleted");
                        manageBrand(1);
                    }
                    else
                    {
                        alert(data);
                    }
                }
            })
        }
    })


    $("#update_brand_form").on("submit", function () {
        if ($("#update_brand").val() == "") {
            $("#update_brand").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter Distributer Name</span> ");
        }
        else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_brand_form").serialize(),
                success: function (data) {
                    window.location.href = "";
                }
            })
        }
    })




    $("body").delegate(".edit_brand", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: { updateBrand: 1, id: eid },
            success: function (data) {
                console.log(data);
                $("#bid").val(data["bid"]);
                $("#update_brand").val(data["brand_name"]);

            }
        })

    })



    manageProduct(1);
    function manageProduct(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: { manageProduct: 1, pageno: pn },
            success: function (data) {
                $("#get_product").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageProduct(pn);
    })



    $("body").delegate(".del_product", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Are you sure you want to delete?")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: { deleteProduct: 1, id: did },
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Product is deleted");
                        manageProduct(1);
                    }
                    else {
                        alert(data);
                    }
                }
            })
        }
    })


    $("body").delegate(".edit_product", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: { updateProduct: 1, id: eid },
            success: function (data) {
                console.log(data);
                $("#pid").val(data["pid"]);
                $("#update_pro").val(data["product_name"]);
                $("#select_cat").val(data["cid"]);
                $("#select_brand").val(data["bid"]);
                $("#product_price").val(data["product_price"]);
                $("#product_qty").val(data["product_stock"]);

            }
        })

    })




    $("#update_product_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#update_product_form").serialize(),
            success: function (data) {
                if (data == "UPDATED") {
                    alert(" Product Updated");
                    window.location.href = "";
                }
                else {
                    console.log(data);
                    alert(data);
                }
            }
        })

    })







})


