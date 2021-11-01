<?php

class DBOperation
{
    private $con;

    function __construct()
    {
         include_once("../database/db.php");
         $db = new Database();
         $this->con = $db->connect();
    }

    public function addCategory($parent,$cat)
    {
        $pre_stmt = $this->con->prepare("INSERT INTO `categories`(`parent_cat`, `category_name`, `status`) VALUES (?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("iss",$parent,$cat,$status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if (file_exists("../file/category.txt")) {
            $myfile = fopen("../file/category.txt", "a");
            fwrite($myfile, "Category :" . $cat . "\n");
            fwrite($myfile, "Parent Category :" . $parent . "\n\n");
            fclose($myfile);
        } else {
            $myfile = fopen("../file/category.txt", "w");
            fwrite($myfile, "Category :" . $cat . "\n");
            fwrite($myfile, "Parent Category :" . $parent . "\n\n");
            fclose($myfile);
        }
        if($result)
        {
            return "CAREGORY_ADDED";
        }
        else
        {
            return 0;
        }
    }

    public function getALLRecord($table)
    {
        $pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
        $pre_stmt->execute() or die($this->con->error);
         $result = $pre_stmt->get_result();
         $rows = array();
         if($result->num_rows >0)
         {
                while($row = $result->fetch_assoc())
                {
                    $rows[] = $row;
                }
                return $rows;
         }
         return "NO_DATA";
    }


    public function addBrand($brand_name)
    {
        $pre_stmt = $this->con->prepare("INSERT INTO `brand`(`brand_name`, `status`) VALUES (?,?)");
        $status = 1;
        $pre_stmt->bind_param("si", $brand_name, $status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if (file_exists("../file/distributer.txt")) {
            $myfile = fopen("../file/distributer.txt", "a");
            fwrite($myfile, "Distributer Name :" . $brand_name . "\n\n");
            fclose($myfile);
        } else {
            $myfile = fopen("../file/distributer.txt", "w");
            fwrite($myfile, "Distributer Name :" . $brand_name . "\n\n");
            fclose($myfile);
        }
        if ($result) {
            return "BRAND_ADDED";
        } else {
            return 0;
        }
    }


    public function addProduct($cid,$bid,$pro_name,$price,$stock,$date)
    {
        $pre_stmt = $this->con->prepare("INSERT INTO `products`(`cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES (?,?,?,?,?,?,?)");
        $status = 1;
        $pre_stmt->bind_param("iisdisi",$cid,$bid,$pro_name,$price,$stock,$date, $status);
        $result = $pre_stmt->execute() or die($this->con->error);
        if (file_exists("../file/product.txt")) {
            $myfile = fopen("../file/product.txt", "a");
            fwrite($myfile, "Product Name :" . $pro_name . "\n");
            fwrite($myfile, "Category ID :" . $cid . "\n");
            fwrite($myfile, "Distributer ID :" . $bid . "\n");
            fwrite($myfile, "Price :" . $price . "\n");
            fwrite($myfile, "Stock :" . $stock . "\n");
            fwrite($myfile, "Date :" . $date . "\n\n");
            fclose($myfile);
        } else {
            $myfile = fopen("../file/product.txt", "w");
            fwrite($myfile, "Product Name :" . $pro_name . "\n");
            fwrite($myfile, "Category ID :" . $cid . "\n");
            fwrite($myfile, "Distributer ID :" . $bid . "\n");
            fwrite($myfile, "Price :" . $price . "\n");
            fwrite($myfile, "Stock :" . $stock . "\n");
            fwrite($myfile, "Date :" . $date . "\n\n");
            fclose($myfile);
        }
        if ($result) {
            return "PRODUCT_ADDED";
        } else {
            return 0;
        }
    }


}

//$opr = new DBOperation();
//echo $opr->addCategory(0,"Electronics");
//echo "<pre>";
//print_r($opr->getALLRecord("categories"));

?>