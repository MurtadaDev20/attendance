<?php include "./inc/header.php" ?>
<!-- Left Panel -->
<?php
$fullname = "";
$password = "";
?>
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
                    <h1>ادارة الموظفين</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">لوحه التحكم</a></li>
                        <li><a href="#">الموظفين</a></li>
                        <li class="active">ادارة الموظفين</li>
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
                    <div class="card-header"><strong>اضافة موظف</strong><small></small></div>
                    <div class="card-body card-block">

                        <div class="form-group">
                            <label for="company" class=" form-control-label">اسم الموظف</label>
                            <input type="text" name="fullname" id="company" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="vat" class=" form-control-label">رمز الحضور</label>
                            <input type="text" name="pass" id="vat" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="street" class=" form-control-label">العنوان</label>
                            <input type="text" name="address" id="street" class="form-control">
                        </div>

                        <button type="submit" name="add_btn" class="btn btn-success">اضافة</button>
                    </div>
                </div>
                <?php add_emp() ?>
            </div>

        </form>




        <!-- Table -->
        <div class="animated fadeIn">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">ادارة الموظفين</strong>
                    </div>
                    <div class="card-body text-center">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>العدد</th>
                                    <th>اسم الموظف</th>
                                    <th>رمز الحضور</th>
                                    <th>العنوان</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                $show = mysqli_query($con, "SELECT * FROM employees order by id DESC ");
                                while ($row_show = mysqli_fetch_assoc($show)) {
                                ?>
                                    <tr>
                                        <td><?php echo $num++ ?></td>
                                        <td><?php echo $row_show['FullName'] ?></td>
                                        <td><?php echo $row_show['Password'] ?></td>
                                        <td><?php echo $row_show['Address'] ?></td>
                                        <td>
                                            <a style="color:white" class="btn btn-danger" href="emp_delete.php?id=<?php echo $row_show['id'] ?>"><i class="fa fa-trash"></i></a>
                                            <a style="color:white" class="btn btn-success" href="emp_edit.php?id=<?php echo $row_show['id'] ?>"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- .animated -->



    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include "./inc/footer.php" ?>


<?php
function add_emp()
{
    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_btn'])) {
        $fullname = $_POST['fullname'];
        $password = $_POST['pass'];
        $address = $_POST['address'];
        $count = 0;

        $query_check = mysqli_query($con, "SELECT * FROM employees where FullName = '$fullname' OR Password = '$password'");
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
                    $insert = mysqli_query($con, "INSERT INTO `employees`(`FullName`, `Password`, `Address`) VALUES ('$fullname','$password','$address')");
                    if ($insert) {
                    ?>
                        <div class="alert alert-success " role="alert">
                            تمت اضافة موظف
                        </div>
                <?php
                        // header("REFRESH:1;URL=employees_manage.php");
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
                $insert = mysqli_query($con, "INSERT INTO `employees`(`FullName`, `Password`, `Address`) VALUES ('$fullname','$password','$address')");
                if ($insert) {
                ?>
                    <div class="alert alert-success " role="alert">
                        تمت اضافة موظف
                    </div>
<?php
                    // header("REFRESH:1;URL=employees_manage.php");
                }
            }
        }
    }
}
?>