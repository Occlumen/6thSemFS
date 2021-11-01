<?php
include_once("./database/constants.php");
if(isset($_SESSION["userid"]))
{
    header("location:".DOMAIN."/dashboard.php");
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
</head>

<body>
    <?php
    include_once("./templates/header.php");
    ?>
    <br/>
    <div class="container">
        <?php
        if (isset($_REQUEST["msg"]) and !empty($_GET["msg"])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_GET["msg"]; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
        <div class="card mx-auto" style="width: 25rem;">
            <img src="./images/login.jpg" class="card-img-top mx-auto" style="width:80%; height:80%;margin-top:5%;" alt="Login Icon">
            <div class="card-body">
                <form id="login_form" onsubmit="return false" autocomplete="off">
                    <div class="form-group">
                        <label for="log_email">Email address</label>
                        <input type="email" class="form-control" name="log_email" id="log_email" placeholder="name@example.com">
                        <small id="e_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="log_password">Password</label>
                        <input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
                        <small id="p_error" class="form-text text-muted"></small>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-lock"></span>&nbsp;Login</button>
                    <span><a href="register.php">Register</a></span>
                </form>
            </div>
            <div class="card-footer"><a href="#">Forgot Password</a></div>
        </div>
    </div>

</body>
<script type="text/javascript" src="./js/main.js"></script>

</html>