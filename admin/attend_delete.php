<?php

include './config/config.php';

?>
<?php

if (isset($_GET['id'])) {
    $del_id = $_GET['id'];
    $query = "DELETE from attendance where emp_id ='$del_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header('location:attendance.php');
    }
}
?>
