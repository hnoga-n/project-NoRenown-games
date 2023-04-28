<?php
    include './connect.php';

    $suppName = $_POST['suppName'];
    $suppMail = $_POST['suppMail'];
    $suppTel = $_POST['suppTel'];
    
    $sql = "INSERT INTO supplier(suppName,suppMail,suppTel) VALUES ('$suppName','$suppMail','$suppTel')";
    $result = $conn->query($sql);
    if($result) {
        
            echo
                "<script>
                    alert('Add successfully !')
                    window.location.replace('../view/admin/employee.php?page=listsupply')
                </script>";

    }
    else echo "Error: " . $sql . "<br>" . $conn->error . "<br>" . "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
?>