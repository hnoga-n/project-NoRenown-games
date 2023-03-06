<?php
require_once('../admin/head1.php');
require_once('../admin/leftmenu.php');
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'employee-profile':
            require_once('employeeProfile.php');
            break;
        case 'listgame':
            require_once('listgame.php');
            break;
    }
} else {
    require_once('listgame.php');
}
?>
<script src="../../assets/js/leftmenu.js"></script>
<script src="../../assets/js/listGame.js"></script>
<script src="../../controller/pagination_listGame.js"></script>
<script src="../../controller/deletegame.js"></script>