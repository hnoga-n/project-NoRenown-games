<?php
include './connect.php';
$gname = $_POST['gname'];
$gcategory = $_POST['gcategory'];
$gquantity = $_POST['gquantity'];
$gdiscount = $_POST['gdiscount'];
$gimg = $_POST['gimg'];
$gprice = $_POST['gprice'];
$cfg_os = $_POST['cfg_os'];
$cfg_processor = $_POST['cfg_processor'];
$cfg_graphics = $_POST['cfg_graphics'];
$cfg_storage = $_POST['cfg_storage'];
$about = $_POST['about'];

$sql1 = "
            INSERT INTO games (gname,gcategory,gprice,gdiscount,gimg,gquantity) VALUES
            ('$gname','$gcategory','$gprice',$gdiscount,'$gimg',$gquantity);  
              
    ";
$result1 = $conn->query($sql1);
if ($result1 === TRUE) {
    $sql2 = "
            SELECT gid
            FROM games
            ORDER BY gid DESC
            LIMIT 1
        ";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            $GLOBALS['gdt_id'] = $row['gid'];
        }
    }
    $sql3 = "
                INSERT INTO game_detail (gdt_id,cfg_os,cfg_processor,cfg_graphics,cfg_storage,about) VALUES
                ($gdt_id,'$cfg_os','$cfg_processor','$cfg_graphics','$cfg_storage','$about');
        ";
    $result3 = $conn->query($sql3);
    if ($result3 === TRUE) {
        echo "<script>
                alert('Add successfully !')
                window.location.replace('../view/admin/employee.php?page=listgame')
            </script>";
    } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>" . "Error: " . $sql3 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>" . "Error: " . $sql1 . "<br>" . $conn->error;
}
?>