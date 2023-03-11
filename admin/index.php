<?php include "./config/config.php" ?>
<?php
$username = "";
?>
<!doctype html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color:white">Login Admin</h3>
                </div>
                <div class="login-form">
                    <form method="POST">
                        <div class="form-group">
                            <label>UserName OR Email</label>
                            <input type="text" name="username" class="form-control" class="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" name="sign_in" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>


                    </form>
                    <div class="mt-3">
                        <?php
                        if (isset($_POST['sign_in'])) {
                            login_system();
                        }

                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>

<?php
//Login Checking 
function login_system()
{
    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sign_in'])) {


        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) 
        {
        ?>
            <div class="alert alert-danger" role="alert">
                املا الحقول اولا الحقول فارغة
            </div>
            <?php
        } 
        else 
            {
                

                // query
                $query = "SELECT * FROM admin where (Email ='$username' OR Username ='$username') And Password ='$password'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_assoc($result);

                if ($row) 
                {
                    ?>
                        <div class="alert alert-success" role="alert">
                            تم تسجيل الدخول
                        </div>
                    <?php
                    $_SESSION['name'] = $username;
                    header("REFRESH:1;URL=dashboard.php");
                } 
                else 
                    {
                        ?>
                    <div class="alert alert-danger" role="alert">
                        خطأ في الرمز السري او البريد
                    </div>
                    <?php
                    }
            }
    }
}




?>