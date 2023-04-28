<?php
    include "./connect.php";
    $suppid = $_GET['suppID']; 
    $suppname = $_POST['suppName'];
    $suppMail = $_POST['suppMail'];
    $suppTel = $_POST['suppTel'];

    $sql1 = "UPDATE supplier
            SET suppName = '$suppname', suppMail = '$suppMail' , suppTel = '$suppTel'
            WHERE suppID = $suppid";
    $result1 = $conn->query($sql1);
    if($result1) {
        echo "  <script>
                    alert('Update successfully !')
                    window.location.replace('../view/admin/employee.php?page=listsupply')
                </script>";
    }
    else {
        echo    "Error: " . $sql1 . "<br>" . $conn->error . "<br>" . "Error: " . $sql1 . "<br>" . $conn->error."<br>";
    }
?>