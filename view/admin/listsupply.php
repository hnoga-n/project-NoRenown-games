<div class="main-supplier">
    <div class="title-supplier">
        <span>Suppliers</span>
    </div>
    <div class="nav-bar-supplier">
        <div class="search">
        <input type="search" placeholder="Search" id="searchsupplier" onkeyup="showlistsupplier(this.value,1)">
        </div>
        <?php
            include '../../model/connect.php';
            include '../../model/function_employee.php';
            $accountFeatures = json_decode($features_arr[7],true);
            if($accountFeatures["ADD SUPPLIER"]==1) {
                echo '
                    <div class="button">
                        <a href="./editsupplier.php?page=listsupplier">
                            
                            <button><span>Add</span></button>
                        </a>
                    </div>
                ';
            }
            $conn->close();        
        ?>
        
    </div>  
    <div class="listsuppliers">
        <table>
            <thead>
                <tr>
                <th style="width: 10%;">Supplier ID</th>
                <th style="width: 20%;">Supplier Name</th>
                <th style="width: 25%;">Supplier Mail</th>
                <th style="width: 20%;">Supplier Tel</th>
                <th style="width: 25%;">Action</th>
                </tr>
            </thead>
            <tbody id="showlistsupplier">
                    <!-- Show list account -->
            </tbody>
        </table>
    </div>  
    <div class="pagination-supplier">
        <div id="showpagination-listsupplier">
            <!-- show pagination -->
        </div>
  </div>
</div>
<script src="../../controller/pagination_listsupply.js"></script>
<script src="../../controller/deletesupplier.js"></script>