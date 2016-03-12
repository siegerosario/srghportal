<?php
    session_start();

    require_once('../connection.php');

    $empID = $_SESSION['id'];
    $deptID = $_SESSION['dept_id'];
    $type = mysqli_escape_string($con, $_POST['type']);
    $sched = mysqli_escape_string($con, $_POST['sched']);
    $date = date('Y-m-d H:i:s');

    if($type == '1') {
        $hours = mysqli_escape_string($con, $_POST['hours']);

        $sql = "INSERT INTO overtime (`empid`, `deptid`, `scheduleid`, `hours`, `status`, `date`) VALUES ('$empID', '$deptID', '$sched', '$hours', 'PENDING', '$date')";
    } else if($type == '2') {
        $sql = "INSERT INTO sickleave (`empid`, `deptid`, `scheduleid`, `status`, `date`) VALUES ('$empID', '$deptID', '$sched', 'PENDING', '$date')";
    }

    if(isset($sql)) {
        $query = mysqli_query($con, $sql);

        if(mysqli_affected_rows($con) == 1) {
            echo 'Success! You\'re request has been sent.';
        } else {
            echo 'Oops! Request was not processed. Please refresh the page and try again.';
        }
    } else {
        echo 'Invalid type.';
    }
?>