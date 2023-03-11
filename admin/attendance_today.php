<?php include "./inc/header.php" ?>
<!-- Left Panel -->
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
        $emp_id = $row['id'];
        
    } else {
        header("location:attendance.php");
    }
} else {
    header("location:attendance.php");
}
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
                    <h1>جدول الحضور</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#"> لوحه التحكم</a></li>
                        <li><a href="#">الموظفين</a></li>
                        <li class="active">جدول الحضور</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <strong class="card-title ">
                                <?php
                                    error_reporting(0);
                                    $query_name = mysqli_query($con, "SELECT * FROM `attendance` where emp_id = '$emp_id ' order by id DESC");
                                    $row_name = mysqli_fetch_assoc($query_name);
                                    echo $row_name['Name'];
                                ?>
                            </strong>
                        </div>
                        <div class="card-body text-center">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>العدد</th>
                                        <th>التاريح</th>
                                        <th>اليوم</th>
                                        <th>الوقت</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $num = 1;
                                    $query = mysqli_query($con, "SELECT * FROM `attendance` where emp_id = '$emp_id ' order by id DESC");
                                    while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                        <tr>

                                            <td><?php echo $num++ ?></td>
                                            <td><?php echo $row['Date'] ?></td>
                                            <td><?php echo $row['today'] ?></td>
                                            <td><?php echo $row['time'] ?></td>
                                            <td><a style="color:white" class="btn btn-danger" href="attend_delete.php?id=<?php echo $row['emp_id'] ?>"><i class="fa fa-trash"></i></a></td>


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
        </div><!-- .animated -->
    </div><!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<script>
    (function($) {
        "use strict";

        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
<?php include "./inc/footer.php" ?>