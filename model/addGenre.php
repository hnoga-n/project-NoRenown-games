<?php
    include './connect.php';
    if(isset($_POST['genName'])) {
        $genName = $_POST['genName'];
        $sql="INSERT INTO genres(genName,genStatus) VALUES ('$genName',1)";
        $result = $conn->query($sql);
        if($result) {
            echo "<script>alert('Add genre successfully !')</script>";
            header("location: ../view/admin/employee.php?page=listgenre");
        } else {
            echo "<script>alert('Add genre failed !')</script>";
        }
    } 
    $conn->close();
?>