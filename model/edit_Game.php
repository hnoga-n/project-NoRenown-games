<?php
    include './connect.php';
    $gid = $_GET['gid'];
    $gname = $_POST['gname'];
    $gcategory = $_POST['gcategory'];
    $gquantity = $_POST['gquantity'];
    $gdiscount = $_POST['gdiscount'];
    $gprice = $_POST['gprice'];
    $cfg_os = $_POST['cfg_os'];
    $cfg_processor = $_POST['cfg_processor'];
    $cfg_graphics = $_POST['cfg_graphics'];
    $cfg_storage = $_POST['cfg_storage'];
    $about = $_POST['about'];
    $gimg = "";
    $scr1 = "";
    $scr2 = "";
    $scr3 = "";
    $scr4 = "";
    $trailer = "";

    if(isset($_POST['gscr1']) && isset($_POST['gscr2']) && isset($_POST['gscr3']) && isset($_POST['gscr4']) && isset($_POST['gtrailer'])){
        $scr1 = $_POST['gscr1'];
        $scr2 = $_POST['gscr2'];
        $scr3 = $_POST['gscr3'];
        $scr4 = $_POST['gscr4'];
        $trailer = $_POST['gtrailer'];
    }
    

    if(!empty($_POST['gimg'])) {
        $gimg = $_POST['gimg'];
    } else {
        $sql = "SELECT gimg FROM games WHERE gid = $gid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $gimg = $row['gimg'];
            }
        }
    }
    
    $sql1 = "
                UPDATE games 
                SET gname='$gname',genreID=$gcategory,gprice=$gprice,gdiscount=$gdiscount,gimg='$gimg',gquantity=$gquantity
                WHERE gid=$gid     
            ";
    $sql2 = "
                UPDATE game_detail 
                SET cfg_os='$cfg_os',cfg_processor='$cfg_processor',cfg_graphics='$cfg_graphics',cfg_storage='$cfg_storage',about='$about',screenshot1='$scr1',screenshot2='$scr2',screenshot3='$scr3',screenshot4='$scr4',trailer='$trailer'
                WHERE gdt_id=$gid
    ";
    $sql3="
            UPDATE cart SET cItem_image='$gimg' WHERE cItem_id=$gid
            ";
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    if($result1 === TRUE && $result2 === TRUE && $result3===TRUE) {
        echo "  <script>
                    alert('Update successfully !')
                    window.location.replace('../view/admin/employee.php?page=listgame')
                </script>";
    }
    else {
        echo    "Error: " . $sql1 . "<br>" . $conn->error . "<br>" . "Error: " . $sql1 . "<br>" . $conn->error."<br>".
                "Error: " . $sql2 . "<br>" . $conn->error . "<br>" . "Error: " . $sql2 . "<br>" . $conn->error."<br>".
                "Error: " . $sql3 . "<br>" . $conn->error . "<br>" . "Error: " . $sql3 . "<br>" . $conn->error  ;
    }
?>