<?php
    include "./connect.php";
    $userid = $_GET['userid']; 
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $passwd = $_POST['passwd'];
    $groupid = $_POST['groupid'];
    if(isset($_POST['acc_status']))
        $GLOBALS['acc_status'] = $_POST['acc_status'];
        if(!empty($acc_status))
            $acc_status = 1;
        else 
            $acc_status = 0;

    $sql1 = "UPDATE users 
            SET fullname = '$fullname', phone = '$phone' , address = '$address'
            WHERE userID = $userid";
    $sql2 = "UPDATE account
            SET passwd = '$passwd' , groupID = '$groupid' , acc_status = $acc_status
            WHERE userID = $userid";
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    if($result1 && $result2) {
        echo "  <script>
                    alert('Update successfully !')
                    window.location.replace('../view/admin/employee.php?page=listaccount')
                </script>";
    }
    else {
        echo    "Error: " . $sql1 . "<br>" . $conn->error . "<br>" . "Error: " . $sql1 . "<br>" . $conn->error."<br>".
                "Error: " . $sql2 . "<br>" . $conn->error . "<br>" . "Error: " . $sql2 . "<br>" . $conn->error  ;
    }
?>