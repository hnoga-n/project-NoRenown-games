<?php
    include './connect.php';

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $mail = $_POST['mail'];
    $passwd = $_POST['passwd'];
    $groupid = $_POST['groupid'];
    
    $sql = "INSERT INTO users(fullname,phone,address,usertypeID) VALUES ('$fullname','$phone','$address',2)";
    $result = $conn->query($sql);
    if($result) {
        $sql2 = "SELECT userID 
                FROM users ORDER BY userID DESC 
                LIMIT 1";
        $result2 = $conn->query($sql2);
        if($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                $GLOBALS['userid'] = $row['userID'];
            }
        }
        $date_create = date("Y-m-d");
        $sql1 = "INSERT INTO account(passwd,mail,groupID,userID,date_create,acc_status) VALUES 
                ('$passwd','$mail',$groupid,$userid,'$date_create',1)";
        $result1 = $conn->query($sql1);
        if($result1) {
            echo
                "<script>
                    alert('Add successfully !')
                    window.location.replace('../view/admin/employee.php?page=listaccount')
                </script>";
        }
        else echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>" . "Error: " . $sql1 . "<br>" . $conn->error;
    }
    else echo "Error: " . $sql . "<br>" . $conn->error . "<br>" . "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
?>