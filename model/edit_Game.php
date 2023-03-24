<?php
    include './connect.php';
    $gid = $_GET['gid'];
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
    $scr1 = $_POST['scr1'];
    $scr2 = $_POST['scr2'];
    $scr3 = $_POST['scr3'];
    $scr4 = $_POST['scr4'];
    $trailer = $_POST['trailer'];

    $sql1 = "
                UPDATE games 
                SET gname='$gname',gcategory='$gcategory',gprice=$gprice,gdiscount=$gdiscount,gimg='$gimg',gquantity=$gquantity
                WHERE gid=$gid     
            ";
    $sql2 = "
                UPDATE game_detail 
                SET cfg_os='$cfg_os',cfg_processor='$cfg_processor',cfg_graphics='$cfg_graphics',cfg_storage='$cfg_storage',about='$about',screenshot1 = '$scr1',screenshot2 = '$scr2',screenshot3 = '$scr3',screenshot4 = '$scr4',trailer = '$trailer'
                WHERE gdt_id=$gid
    ";
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    if($result1 === TRUE && $result2 === TRUE) {
        echo "  <script>
                    alert('Update successfully !')
                    window.location.replace('../view/admin/employee.php?page=listgame')
                </script>";
    }
    else {
        echo    "Error: " . $sql1 . "<br>" . $conn->error . "<br>" . "Error: " . $sql1 . "<br>" . $conn->error."<br>".
                "Error: " . $sql2 . "<br>" . $conn->error . "<br>" . "Error: " . $sql2 . "<br>" . $conn->error  ;
    }
?>