<?php include "./inc/header.php" ?>
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
                        <div class="card-header">
                            <strong class="card-title">جدول الحضور</strong>
                        </div>
                        <div class="card-body text-center">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>العدد</th>
                                        <th>اسم الموظف</th>
                                        <th>استعلام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $num = 1;
                                    $query = mysqli_query($con , "SELECT * FROM `employees` order by id DESC");
                                    while($row = mysqli_fetch_assoc($query))
                                    {
                                        ?>
                                        <tr>

                                        <td><?php echo $num++?></td>
                                        <td><?php echo $row['FullName']?></td>
                                        <td><a style="color:white" class="btn btn-danger" href="attendance_today.php?id=<?php echo $row['id']?>"><i class="fa fa-eye"></i></a></td>
                                        
                                        
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