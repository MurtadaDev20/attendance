<?php session_start(); ?>
<?php include 'inc/connection.php'?>
<?php include 'inc/header.php'; ?>

<div class="container">
    <div class="clock">
        <span class="hour"></span> :
        <span class="minute"></span> :
        <span class="second"></span>
        <span class="period"></span>
        <div class="date"></div>
    </div>
    <div class="content text-center">
        <h3 class="text-center">ادخل رمز الموظف</h3>
        <form class="pt-4" method="POST">
            <div class="mb-3 mt-4">
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="pass_btn" class="btn btn-success text-center mt-4">تسجيل</button>
        </form>
        <?php add_pass();?>
    </div>
</div>
<?php include './inc/footer.php'; ?>



<?php
function add_pass()
{
    global $con;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pass_btn'])) 
    {
        $password = $_POST['pass'];

        if (empty($password)) 
        {
            ?>
                <div class="alert alert-danger mt-3" role="alert">
                    املائ الحقل اولاً
                </div>
            <?php
        }
        else 
            {   $count = 0;
                $query =  mysqli_query($con,  "SELECT * FROM employees where Password ='$password'");
                $row = mysqli_fetch_assoc($query);
                $count = mysqli_num_rows($query);
                
                
                    if($count > 0)
                    
                    {
                            date_default_timezone_set('Asia/Baghdad');
                            $time_str = date('H:i:s');
                            $time = DateTime::createFromFormat('H:i:s', $time_str);
                            $time_12h = $time->format('h:i:s A');

                            $day = date('l');




                            $name = $row['FullName'];
                            $emp_id = $row['id'];
                            $insert = mysqli_query($con , "INSERT INTO `attendance`(`Name`,`emp_id`,`today`,`time`) VALUES ('$name','$emp_id','$day','$time_12h')");
                            if($insert)
                            {
                                ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                    <?php echo $name;?> تم التسجيل
                                    </div>
                                <?php
                                header("REFRESH:2;URL=index.php");
                                
                            }
                    }
                    else
                        {
                                ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        الرمز خطا
                                    </div>
                                <?php
                                
                        }
            }
    }
}
?>