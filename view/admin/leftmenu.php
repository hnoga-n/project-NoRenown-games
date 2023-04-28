
<div class="sidebar" onmouseenter="openSidebar()" onmouseleave="closeSidebar()">
    <div class="logo">
        <img src="../../assets/img/logo.png" alt=". . .">
        <div class="logo-text">
            <span class="text1">NoRENOWN</span><br>
            <span class="text2">GAMING</span>
        </div>
    </div>
    <nav>
        <div class="nav-title">
            Features
        </div>
        <ul>
            <?php
                include '../../model/connect.php';
                if(isset($_COOKIE['accountId'])) {
                    $accid = $_COOKIE['accountId'];
                    $sql = "select feaName,feaIcon,feaCode
                            from ((features join auth_group_detail on features.feaID=auth_group_detail.feaID) join auth_group on auth_group_detail.groupID = auth_group.groupID) join account on auth_group.groupID = account.groupID
                            where accid=$accid and visible=1
                            group by feaName,feaIcon,feaCode";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if($_GET['page'] == $row['feaCode']) {
                                $active = "active";
                            } else 
                                $active = "";
                            echo "<a href='employee.php?page=".$row['feaCode']."'>
                                    <li class='nav-item $active'>
                                        <i class='".$row['feaIcon']."'></i>
                                        <span>".$row['feaName']."</span>
                                    </li>
                                </a>";
                        }
                    }
                }
            ?>
            <!--
            <a href="employee.php?page=import">
                <li class="nav-item <?= ($_GET['page'] == 'import') ? 'active' : '' ?>">
                    <i class="fa-sharp fa-solid fa-dolly"></i>
                    <span>Import goods</span>
                </li>
            </a>
            <a href="employee.php?page=listgame">
                <li class="nav-item <?= ($_GET['page'] == 'listgame') ? 'active' : '' ?>">
                    <i class="fa-solid fa-gamepad"></i>
                    <span>Games</span>
                </li>
            </a>
            <a href="employee.php?page=listaccount">
                <li class="nav-item <?= ($_GET['page'] == 'listaccount') ? 'active' : '' ?>">
                    <i class="fa-solid fa-users-gear"></i>
                    <span>Accounts</span>
                </li>
            </a>
            <a href="employee.php?page=statistic">
                <li class="nav-item <?= ($_GET['page'] == 'statistic') ? 'active' : '' ?>">
                    <i class="fa-solid fa-chart-simple"></i>
                    <span>Statistic</span>
                </li>
            </a>
            <a href="employee.php?page=authorization">
                <li class="nav-item <?= ($_GET['page'] == 'authorization') ? 'active' : '' ?>">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>Authorization</span>
                </li>
            </a>
            <a href="employee.php?page=listgametrash">
                <li class="nav-item <?= ($_GET['page'] == 'listgametrash') ? 'active' : '' ?>">
                    <i class="fa-solid fa-trash-can"></i>
                    <span>Trash Game</span>
                </li>
            </a> 
            <a href="employee.php?page=listsupply">
                <li class="nav-item <?= ($_GET['page'] == 'listsupply') ? 'active' : '' ?>">
                    <i class="fa-solid fa-truck-field"></i>
                    <span>Supplier</span>

            <a href="employee.php?page=listgenre">
                <li class="nav-item <?= ($_GET['page'] == 'listbills') ? 'active' : '' ?>">
                    <i class="fa-solid fa-dice-d6"></i>
                    <span>Genres</span>

                </li>
            </a>-->
        </ul>
        <hr>
        <div class="nav-title">
            Private
        </div>
        <ul>
            <a href="employee.php?page=employee-profile">
                <li class="nav-item <?= ($_GET['page'] == 'employee-profile') ? 'active' : '' ?>">
                    <i class="fa-solid fa-user-large"></i>
                    <span>Your profile</span>
                </li>
            </a>
            <a href="../../model/logout.php">
                <li class="nav-item">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Log out</span>
                </li>
            </a>
        </ul>
    </nav>

</div>