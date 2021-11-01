<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
    header("location:" . DOMAIN . "/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffee Billing Management System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./js/order.js"></script>
</head>

<body>
    <?php
    include_once("./templates/header.php");
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow: 0 0 25px 0 lightgrey;">
                    <div class="card-header">
                        <h4>New Orders</h4>
                    </div>
                    <div class="card-body">
                        <form id="get_order_data" action="" onsubmit="return false">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="">Order Date</label>
                                <div class="col-sm-6">
                                    <input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="">Customer Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="cust_name" name="cust_name" class="form-control form-control-sm" value="" placeholder="Enter Customer Name" required />
                                </div>
                            </div>
                            <br>
                            <div class="card" style="box-shadow: 0 0 15px 0 lightgrey;">
                                <div class=" card-body">
                                    <h3>Make a ORDER List</h3>
                                    <table text-align="center" style="width: 800px; ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="text-align: center;">Item Name</th>
                                                <th style="text-align: center;">Total Quantity</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th style="text-align: center;">Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invoice_item">
                                            <!--   <tr>
                                                <td><b id="number">1</b></td>
                                                <td><select name="pid[]" class="form-control form-control-sm" required>
                                                        <option value="">Washing Machine</option>
                                                    </select></td>
                                                <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>
                                                <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
                                                <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
                                                <td>Rs : 1540</td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                    <br>
                                    <center>
                                        <button id="add" style="width: 150px;" class="btn btn-success">Add</button>
                                        <button id="remove" style="width: 150px;" class="btn btn-danger">Remove</button>
                                    </center>
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="sub_total" class="col-sm-3 col-form-label" align="right">Sub Total</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="sub_total" class="form-control form-control-sm" id="sub_total" required />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="gst" class="col-sm-3 col-form-label" align="right">GST (18%)</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="gst" class="form-control form-control-sm" id="gst" required />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="discount" class="col-sm-3 col-form-label" align="right">Discount</label>
                                <div class="col-sm-6">
                                    <input type="text" name="discount" class="form-control form-control-sm" id="discount" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="net_total" class="col-sm-3 col-form-label" align="right">Net Total</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="net_total" class="form-control form-control-sm" id="net_total" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="paid" class="col-sm-3 col-form-label" align="right">Paid</label>
                                <div class="col-sm-6">
                                    <input type="text" name="paid" class="form-control form-control-sm" id="paid" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="due" class="col-sm-3 col-form-label" align="right">Due</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly name="due" class="form-control form-control-sm" id="due" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="payment_type" class="col-sm-3 col-form-label" align="right">Payment Type</label>
                                <div class="col-sm-6">

                                    <select name="payment_type" id="payment_type" class="col-sm-3 col-form-label" required>
                                        <option selected value="">Cash</option>
                                        <option value="">Card</option>
                                        <option value="">Draft</option>
                                        <option value="">Cheque</option>
                                    </select>

                                </div>
                            </div>

                            <center>
                                <input type="submit" name="" id="order_form" style="width: 150px;" class="btn btn-info" value="Order">
                                <input type="submit" name="" id="print_invoice" style="width: 150px;" class="btn btn-success d-none" value="Print Bill">
                            </center>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>