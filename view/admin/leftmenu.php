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
                <a href="">
                    <li class="nav-item">
                        <i class="fa-solid fa-barcode"></i>
                        <span>Bills</span>
                    </li>
                </a>
                <a href="">
                    <li class="nav-item">
                        <i class="fa-sharp fa-solid fa-dolly"></i>
                        <span>Import goods</span>
                    </li>
                </a>
                <a href="employee.php?page=listgame">
                    <li class="nav-item <?=($_GET['page']=='listgame') ? 'active':''?>">
                        <i class="fa-solid fa-gamepad"></i>
                        <span>Games</span>
                    </li>
                </a>
                <a href="employee.php?page=listaccount">
                    <li class="nav-item <?=($_GET['page']=='listaccount') ? 'active':''?>" >
                        <i class="fa-solid fa-users-gear"></i>
                        <span>Accounts</span>
                    </li>
                </a>
                <a href="employee.php?page=statistic">
                    <li class="nav-item <?=($_GET['page']=='statistic') ? 'active':''?>">
                        <i class="fa-solid fa-chart-simple"></i>
                        <span>Statistic</span>
                    </li>
                </a>
                <a href="employee.php?page=authorization">
                    <li class="nav-item <?=($_GET['page']=='authorization') ? 'active':''?>">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <span>Authorization</span>
                    </li>
                </a>
                <a href="employee.php?page=listgametrash">
                    <li class="nav-item <?=($_GET['page']=='listgametrash') ? 'active':''?>">
                    <i class="fa-solid fa-trash-can"></i>
                        <span>Trash Game</span>
                    </li>
                </a>
            </ul>
            <hr>
            <div class="nav-title">
                Private
            </div>
            <ul>
                <a href="employee.php?page=employee-profile">
                    <li class="nav-item <?=($_GET['page']=='employee-profile') ? 'active':''?>">
                        <i class="fa-solid fa-user-large"></i>
                        <span>Your profile</span>
                    </li>
                </a>
                <a href="../../index.php">
                    <li class="nav-item">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Log out</span>
                    </li>
                </a>
            </ul>
    </nav>
    
</div>