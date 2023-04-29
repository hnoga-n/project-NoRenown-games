<?php
    include './connect.php';
    if(isset($_POST['genName'])) {
        $genName = $_POST['genName'];
        $sql1="SELECT genName FROM genres";
        $result1= $conn->query($sql1);
        $name=array();
        if($result1->num_rows > 0) {
            while($row=$result1->fetch_assoc()) {
                $name[]=$row['genName'];
            }
        }
        $flag=false;
        for($i=0;$i<count($name);$i++) {
            if(strtolower($name[$i]) == strtolower($genName)) {
                $flag=true;
                break;
            }
        }
        if($flag==false) {
            $sql="INSERT INTO genres(genName,genStatus) VALUES ('$genName',1)";
            $result = $conn->query($sql);
            if($result) {
                echo "<script>
                        alert('Add genre successfully !')
                        window.location.replace('../view/admin/employee.php?page=listgenre')
                    </script>";
            } else {
                echo "<script>
                            alert('Add genre failed !')
                            window.location.replace('../view/admin/employee.php?page=listgenre')
                    </script>";
            }
        } else {
            echo "<script>
                    alert('Duplicate or Exist for Genre Name!')
                    window.location.replace('../view/admin/employee.php?page=listgenre')
                </script>";
        }
    } 
    $conn->close();
    ?>
