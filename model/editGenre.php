<?php
    include './connect.php';
    if(isset($_POST['genid']) && isset($_POST['genName'])) {
        $genid = $_POST['genid'];
        $genName = $_POST['genName'];
        $sql="UPDATE genres SET genName='$genName' WHERE genID=$genid";
        $result = $conn->query($sql);
        if($result) {
            echo "<script>alert('Update genre successfully !')</script>";
            header("location: ../view/admin/employee.php?page=listgenre");
        } else {
            echo "<script>alert('Update genre failed !')</script>";
        }
    } else {
        echo "<script>alert('Update genre failed !')</script>";
    }
    $conn->close();
?>