<?php include "./inc/header.php" ?>
<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $count = 0;
    global $con;
    $id = $_GET['id'];
    $query = "SELECT * FROM employees where id = '$id'";
    $res = mysqli_query($con, $query);
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        $row = mysqli_fetch_assoc($res);
        $fullname = $row['FullName'];
        $password = $row['Password'];
        $address = $row['Address'];
    } else {
        header("location:employees_manage.php");
    }
} else {
    header("location:employees_manage.php");
}
?>
<!-- Left Panel -->

<?php include "./inc/saidbar.php" ?>

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php include "./inc/navbar.php" ?>
    <!-- Header-->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>تعديل الموظفين</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">لوحه التحكم</a></li>
                        <li><a href="#">الموظفين</a></li>
                        <li class="active"> تعديل الموظفين</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content mt-3">

        <form method="POST">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>تعديل موظف</strong><small></small></div>
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label for="company" class=" form-control-label">اسم الموظف</label>
                            <input type="text" name="fullname" id="company" class="form-control" value="<?php echo $fullname ?>">
                        </div>

                        <div class="form-group">
                            <label for="vat" class=" form-control-label">رمز الحضور</label>
                            <input type="text" name="pass" id="vat" class="form-control" value="<?php echo $password ?>">
                        </div>

                        <div class="form-group">
                            <label for="street" class=" form-control-label">العنوان</label>
                            <input type="text" name="address" id="street" class="form-control" value="<?php echo $address ?>">
                        </div>

                        <button type="submit" name="edit_btn" class="btn btn-success">تعديل</button>
                    </div>
                </div>

            </div>

        </form>








    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include "./inc/footer.php" ?>


<?php

    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_btn'])) {
        $fullname = $_POST['fullname'];
        $password = $_POST['pass'];
        $address = $_POST['address'];
        $count = 0;

        $query_check = mysqli_query($con, "SELECT * FROM employees where  Password = '$password'");
        $count = mysqli_num_rows($query_check);
        // $row_check = mysqli_fetch_assoc($query_check);
        if ($count > 0) {
            if ($query_check) {
?>
                <div class="alert alert-danger" role="alert">
                    هناك اسم او رمز مكرر
                </div>
                <?php
            } else {
                if (empty($fullname) || empty($password) || empty($address)) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        املأ الحقول اولا
                    </div>
                    <?php
                } else {
                    $update = mysqli_query($con, "UPDATE `employees` SET ,`FullName`='$fullname',`Password`='$password',`Address`='$address' WHERE id = $id)");
                    if ($update) {
                    ?>
                        <div class="alert alert-success " role="alert">
                            تمت تحديث موظف
                        </div>
                <?php
                        header("REFRESH:1;URL=employees_manage.php");
                    }
                }
            }
        } else {
            if (empty($fullname) || empty($password) || empty($address)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    املأ الحقول اولا
                </div>
                <?php
            } else {
                $update = mysqli_query($con, "UPDATE `employees` SET `FullName`='$fullname',`Password`='$password',`Address`='$address' WHERE `id` = '$id' ");
                if ($update) {
                ?>
                    <div class="alert alert-success " role="alert">
                        تمت تحديث موظف
                    </div>
                <?php
                    header("REFRESH:1;URL=employees_manage.php");
                }
            }
        }
    }

?>