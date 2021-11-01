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
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
    <?php
    include_once("./templates/header.php");
    ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <img src="./images/user.png" style="width:70%; height:50%;" class="card-img-top mx-auto" alt="User">
                    <div class="card-body">
                        <h4 class="card-title">Profile Info</h4>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Navya N</p>
                        <p class="card-text"><i class="fa fa-suitcase">&nbsp;</i>Admin</p>
                        <p class="card-text"><i class="fa fa-clock-o">&nbsp;</i>Last Login : XXXX:XX:XX </p>
                        <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card" style="width: 54rem;">
                    <img src="./images/coffee.png" class="card-img-top" style="width:120px; height: 150px;" alt="Coffee Picture">
                    <div class="card-body">
                        <h1 class="card-title">Welcome Admin</h1>
                        <div class="row">
                            <div class="col-6">
                                <iframe src="https://free.timeanddate.com/clock/i7vbnyc6/n438/szw210/szh210/hocbbb/hbw10/hfc754c29/cf100/hnc432f30/fav0/fiv0/mqcfff/mqs4/mql25/mqw12/mqd78/mhcfff/mhs2/mhl5/mhw2/mhd78/mmv0/hhcfff/hhs2/hhl50/hhw8/hmcfff/hms2/hml70/hmw8/hmr4/hscfff/hss3/hsl70/hsw3" frameborder="0" width="210" height="210"></iframe>

                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">New Order</h5>
                                        <p class="card-text">Today's Good Mood<i class="fa fa-smile-o">&nbsp;</i> is sponsored by Coffee</p>
                                        <br>
                                        <br>
                                        <a href="new_order.php" class="btn btn-primary">Order<i class="fa fa-coffee">&nbsp;</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Menu</h5>
                        <p class="card-text">You can add and manage Menu.</p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#form_menu" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary"><i class="fa fa-calendar-plus-o">&nbsp;</i>Add</a>
                        <a href="manage_categories.php" class="btn btn-primary"><i class="fa fa-check-square-o">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Distributers</h5>
                        <p class="card-text">Has details of distributers.</p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#form_distributer" class="btn btn-primary"><i class="fa fa-calendar-plus-o">&nbsp;</i>Add</a>
                        <a href="manage_brand.php" class="btn btn-primary"><i class="fa fa-check-square-o">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Stock</h5>
                        <p class="card-text">Updating the Storage unit items.</p>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#form_stock" class="btn btn-primary"><i class="fa fa-calendar-plus-o">&nbsp;</i>Add</a>
                        <a href="manage_product.php" class="btn btn-primary"><i class="fa fa-check-square-o">&nbsp;</i>Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once("./templates/menu.php");
    ?>


    <?php
    include_once("./templates/stock.php");
    ?>


    <?php
    include_once("./templates/distributer.php");
    ?>
</body>

</html>