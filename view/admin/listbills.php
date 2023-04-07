<div class="main">
    <div class="title">
        <span>Bills</span>
    </div>
    <div class="nav-bar">
        <div class="search">
        <input type="search" placeholder="Search" id="searchbill" onkeyup="showlistbill(this.value,1)">
        </div>
        
        <div class="button">
            <a href="./editaccount.php?page=listaccount">
                <button><span>Add</span></button>
            </a>
        </div>
    </div>  
    <div class="listbills">
        <table>
            <thead>
                <tr>
                <th style="width: 5%;">OderID</th>
                <th style="width: 5%;">AccountID</th>
                <th style="width: 10%;">Total Price</th>
                <th style="width: 5%;">Date Created</th>
                <th style="width: 20%;">Consignee Name</th>
                <th style="width: 15%;">Address</th>
                <th style="width: 10%;">Phone Number</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody id="showlistbill">
                    <!-- Show list account -->
            </tbody>
        </table>
    </div>  
    <div class="pagination">
        <div id="showpagination-listbill">
            <!-- show pagination -->
        </div>
  </div>
</div>
<script src="../../controller/pagination_listbill.js"></script>
<script src="../../controller/orderstatus.js"></script>
<!-- <script src="../../controller/deleteaccount.js"></script> -->