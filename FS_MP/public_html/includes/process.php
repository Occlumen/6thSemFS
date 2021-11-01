<?php
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

if (isset($_POST["username"]) and isset($_POST["email"])) {
    $user = new User();
    $result = $user->createUserAccount($_POST["username"], $_POST["email"], $_POST["password1"], $_POST["employeetype"]);
    echo $result;
    exit();
}


//For login processing
if (
    isset($_POST["log_email"]) and isset($_POST["log_password"])
) {
    $user = new User();
    $result = $user->userLogin($_POST["log_email"], $_POST["log_password"]);
    echo $result;
    exit();
}


//To get category
if (isset($_POST["getCategory"])) {
    $obj = new DBOperation();
    $rows = $obj->getALLRecord("categories");
    foreach ($rows as $row) {
        echo "<option value='" . $row["cid"] . "'>" . $row["category_name"] . "</option>";
    }
    exit();
}

//To get brand
if (isset($_POST["getBrand"])) {
    $obj = new DBOperation();
    $rows = $obj->getALLRecord("brand");
    foreach ($rows as $row) {
        echo "<option value='" . $row["bid"] . "'>" . $row["brand_name"] . "</option>";
    }
    exit();
}

//Add Category
if (
    isset($_POST["category_name"]) and isset($_POST["parent_cat"])
) {
    $obj = new DBOperation();
    $result = $obj->addCategory($_POST["parent_cat"], $_POST["category_name"]);
    echo $result;
    exit();
}



//Add Brand
if (isset($_POST["brand_name"])) {
    $obj = new DBOperation();
    $result = $obj->addBrand($_POST["brand_name"]);
    echo $result;
    exit();
}


//Add Product
if (isset($_POST["added_date"]) and isset($_POST["product_name"])) {
    $obj = new DBOperation();
    $result = $obj->addProduct($_POST["select_cat"], $_POST["select_brand"], $_POST["product_name"], $_POST["product_price"], $_POST["product_qty"], $_POST["added_date"]);
    echo $result;
    exit();
}


//Manage menu
if (isset($_POST["manageCategory"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("categories", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["category"]; ?>
                </td>
                <td><?php echo $row["parent"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['cid']; ?>" class="btn btn-danger btn-sm del_cat">Delete</a>
                    <a href="#" eid="<?php echo $row['cid']; ?>" data-bs-toggle="modal" data-bs-target="#update_menu" class="btn btn-info btn-sm edit_cat">Edit</a>
                </td>
            </tr>
        <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>
        <?php
        exit();
    }
}


//Delete Category
if (isset($_POST["deleteCategory"])) {
    $m = new Manage();
    $h = $m->getSingleRecord("categories", "cid", $_POST["id"]);
    $cat = $h["category_name"];
    $url = "../file/category.txt";
    $strings = file_get_contents($url);
    $strreplace = str_replace($cat,"Deleted",$strings);
    file_put_contents($url,$strreplace);
    $result = $m->deleteRecord("categories", "cid", $_POST["id"]);
    echo $result;
    exit();
}


//Update Category
if (isset($_POST["updateCategory"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("categories", "cid", $_POST["id"]);
    echo json_encode($result);
    exit();
}


//Update Category
if (isset($_POST["update_cat"])) {
    $m = new Manage();
    $id = $_POST["cid"];
    $name = $_POST["update_cat"];
    $parent = $_POST["parent_cat"];
    if (file_exists("../file/updatecategory.txt")) {
        $myfile = fopen("../file/updatecategory.txt", "a");
        fwrite($myfile, "Category :" . $name . "\n");
        fwrite($myfile, "Parent Category :" . $parent . "\n\n");
        fclose($myfile);
    } else {
        $myfile = fopen("../file/updatecategory.txt", "w");
        fwrite($myfile, "Category :" . $name . "\n");
        fwrite($myfile, "Parent Category :" . $parent . "\n\n");
        fclose($myfile);
    }
    $result = $m->update_record("categories", ["cid" => $id], ["parent_cat" => $parent, "category_name" => $name, "status" => 1]);
    echo ($result);
    exit();
}



//Manage brand
if (isset($_POST["manageBrand"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("brand", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand">Delete</a>
                    <a href="#" eid="<?php echo $row['bid']; ?>" data-bs-toggle="modal" data-bs-target="#update_distributer" class="btn btn-info btn-sm edit_brand">Edit</a>
                </td>
            </tr>
        <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>
        <?php
        exit();
    }
}



//Delete Brand
if (isset($_POST["deleteBrand"])) {
    $m = new Manage();
    $h = $m->getSingleRecord("brand", "bid", $_POST["id"]);
    $brand = $h["brand_name"];
    $url = "../file/distributer.txt";
    $strings = file_get_contents($url);
    $strreplace = str_replace($brand, "Deleted", $strings);
    file_put_contents($url, $strreplace);
    $result = $m->deleteRecord("brand", "bid", $_POST["id"]);
    echo $result;
    exit();
}


//Update Brand
if (isset($_POST["updateBrand"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("brand", "bid", $_POST["id"]);
    echo json_encode($result);
    exit();
}


//Update Brand
if (isset($_POST["update_brand"])) {
    $m = new Manage();
    $id = $_POST["bid"];
    $name = $_POST["update_brand"];
    if (file_exists("../file/updatedistributer.txt")) {
        $myfile = fopen("../file/updatedistributer.txt", "a");
        fwrite($myfile, "Distributer Name :" . $name . "\n\n");
        fclose($myfile);
    } else {
        $myfile = fopen("../file/updatedistributer.txt", "w");
        fwrite($myfile, "Distributer Name :" . $name . "\n\n");
        fclose($myfile);
    }
    $result = $m->update_record("brand", ["bid" => $id], ["brand_name" => $name, "status" => 1]);
    echo ($result);
    exit();
}



//Manage product
if (isset($_POST["manageProduct"])) {
    $m = new Manage();
    $result = $m->manageRecordWithPagination("products", $_POST["pageno"]);
    $rows = $result["rows"];
    $pagination = $result["pagination"];
    if (count($rows) > 0) {
        $n = (($_POST["pageno"] - 1) * 5) + 1;
        foreach ($rows as $row) {
        ?>
            <tr>
                <td><?php echo $n; ?></td>
                <td><?php echo $row["product_name"]; ?></td>
                <td><?php echo $row["category_name"]; ?></td>
                <td><?php echo $row["brand_name"]; ?></td>
                <td><?php echo $row["product_price"]; ?></td>
                <td><?php echo $row["product_stock"]; ?></td>
                <td><?php echo $row["added_date"]; ?></td>
                <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
                <td>
                    <a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
                    <a href="#" eid="<?php echo $row['pid']; ?>" data-bs-toggle="modal" data-bs-target="#update_stock" class="btn btn-info btn-sm edit_product">Edit</a>
                </td>
            </tr>
        <?php
            $n++;
        }
        ?>
        <tr>
            <td colspan="5"><?php echo $pagination; ?></td>
        </tr>
    <?php
        exit();
    }
}



//Delete Product
if (isset($_POST["deleteProduct"])) {
    $m = new Manage();
    $h = $m->getSingleRecord("products", "pid", $_POST["id"]);
    $pro = $h["product_name"];
    $url = "../file/product.txt";
    $strings = file_get_contents($url);
    $strreplace = str_replace($pro, "Deleted", $strings);
    file_put_contents($url, $strreplace);
    $result = $m->deleteRecord("products", "pid", $_POST["id"]);
    echo $result;
    exit();
}


//Update Product
if (isset($_POST["updateProduct"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("products", "pid", $_POST["id"]);
    echo json_encode($result);
    exit();
}


//Update Product
if (isset($_POST["update_pro"])) {
    $m = new Manage();
    $id = $_POST["pid"];
    $name = $_POST["update_pro"];
    $cat = $_POST["select_cat"];
    $brand = $_POST["select_brand"];
    $price = $_POST["product_price"];
    $qty = $_POST["product_qty"];
    $date = $_POST["added_date"];
    if (file_exists("../file/updateproduct.txt")) {
        $myfile = fopen("../file/updateproduct.txt", "a");
        fwrite($myfile, "Product Name :" . $name . "\n");
        fwrite($myfile, "Category ID :" . $cat . "\n");
        fwrite($myfile, "Distributer ID :" . $brand . "\n");
        fwrite($myfile, "Price :" . $price . "\n");
        fwrite($myfile, "Stock :" . $qty . "\n");
        fwrite($myfile, "Date :" . $date . "\n\n");
        fclose($myfile);
    } else {
        $myfile = fopen("../file/updateproduct.txt", "w");
        fwrite($myfile, "Product Name :" . $name . "\n");
        fwrite($myfile, "Category ID :" . $cat . "\n");
        fwrite($myfile, "Distributer ID :" . $brand . "\n");
        fwrite($myfile, "Price :" . $price . "\n");
        fwrite($myfile, "Stock :" . $qty . "\n");
        fwrite($myfile, "Date :" . $date . "\n\n");
        fclose($myfile);
    }
    $result = $m->update_record("products", ["pid" => $id], ["cid" => $cat, "bid" => $brand, "product_name" => $name, "product_price" => $price, "product_stock" => $qty, "added_date" => $date, "p_status" => 1]);
    echo ($result);
    exit();
}


//Order processing
if (isset($_POST["getNewOrderItem"])) {
    $obj = new DBOperation();
    $rows = $obj->getALLRecord("products");
    ?>

    <tr>
        <td><b class="number">1</b></td>
        <td><select name="pid[]" class="form-control form-control-sm  pid" required>
                <option value="">Choose Product</option>
                <?php
                foreach ($rows as $row) {
                ?>
                    <option value="<?php echo $row['pid']; ?>"><?php echo $row["product_name"]; ?></option>
                <?php
                }
                ?>
            </select></td>
        <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
        <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
        <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></td>
        <td><input name="pro_name[]" type="hidden" class="form-control form-control-sm  pro_name"></td>
        <td>Rs.<span class="amt ">0</span></td>
    </tr>

<?php
    exit();
}

// get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("products", "pid", $_POST["id"]);
    echo json_encode($result);
    exit();
}



if (isset($_POST["order_date"]) and isset($_POST["cust_name"])) {
    $orderdate = $_POST["order_date"];
    $cust_name = $_POST["cust_name"];

    $ar_tqty = $_POST["tqty"];
    $ar_qty = $_POST["qty"];
    $ar_price = $_POST["price"];
    $ar_pro_name = $_POST["pro_name"];

    $sub_total = $_POST["sub_total"];
    $gst = $_POST["gst"];
    $discount = $_POST["discount"];
    $net_total = $_POST["net_total"];
    $paid = $_POST["paid"];
    $due = $_POST["due"];
    $payment_type = $_POST["payment_type"];

    $m = new Manage();
    echo $result = $m->storeCustomerOrderInvoice($orderdate, $cust_name, $ar_tqty, $ar_qty, $ar_price, $ar_pro_name, $sub_total, $gst, $discount, $net_total, $paid, $due, $payment_type);
    exit();
}


?>