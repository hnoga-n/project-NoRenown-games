<div class="main">
    <div class="title">
        <span>Accounts</span>
    </div>
    <div class="nav-bar">
        <div class="search">
        <input type="search" placeholder="Search" id="searchaccount" onkeyup="showlistaccount(this.value,document.getElementById('groupcategory').value,1)">
        </div>
        <div class="selection">
            <select name="groupcategory" id="groupcategory" onchange="showlistaccount(document.getElementById('searchaccount').value,this.value,1)">
                 <?php
                    include '../../model/connect.php';
                    $sql = "SELECT * FROM auth_group";
                    $result = $conn->query($sql);
                    echo"<option value=0>All</option>";
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=".$row['groupID'].">".$row['groupName']."</option>";
                        }
                    }
                ?> 
            </select>
        </div>
        <?php
            include '../../model/connect.php';
            include '../../model/function_employee.php';
            $accountFeatures = json_decode($features_arr[1],true);
            if($accountFeatures["ADD ACCOUNT"]==1) {
                echo '
                    <div class="button">
                        <a href="./editaccount.php?page=listaccount">
                            
                            <button><span>Add</span></button>
                        </a>
                    </div>
                ';
            }
            $conn->close();        
        ?>
    </div>  
    <div class="listgames">
        <table>
            <thead>
                <tr>
                <th style="width: 5%;">AccountID</th>
                <th style="width: 5%;">UserID</th>
                <th style="width: 20%;">Full name</th>
                <th style="width: 20%;">Mail</th>
                <th style="width: 10%;">Phone</th>
                <th style="width: 10%;">Group</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody id="showlistaccount">
                    <!-- Show list account -->
            </tbody>
        </table>
    </div>  
    <div class="pagination">
        <div id="showpagination-listaccount">
            <!-- show pagination -->
        </div>
  </div>
</div>
<script src="../../controller/pagination_listaccount.js"></script>
<script src="../../controller/deleteaccount.js"></script>