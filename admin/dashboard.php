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
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content mt-3">




        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                    
                    <h4 class="mb-0">
                        <span class="count">
                            <?php
                                $num = 0;
                                $show = mysqli_query($con, "SELECT * FROM employees ");
                                while (mysqli_fetch_assoc($show)) 
                                {
                                    $num++;
                                }
                                
                            ?>
                            <?php echo $num?>
                            </span>
                        
                    </h4>
                    <p class="text-light">عدد الموظفين</p>

                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart1"></canvas>
                    </div>

                </div>

            </div>
        </div>






    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<?php include "./inc/footer.php" ?>