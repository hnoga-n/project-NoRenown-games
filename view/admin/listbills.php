<div class="main-bill">
    <div class="title-bill">
        <span>Bills</span>
    </div>
    <div class="nav-bar-bill">
        <div class="search">
        <input type="search" placeholder="Search" id="searchbill" onkeyup="showlistbill(this.value,1,document.querySelector('#groupcategory').value)">
        </div>
        <div class="selection">
            <select name="groupcategory" id="groupcategory">
                <option value="all">All</option>
                <option value="0">Waiting</option>
                <option value="1">Processed</option>
                <option value="2">Cancelled</option>
            </select>
        </div>
        
    </div>  
    <div class="listbills">
        <table>
            <thead>
                <tr>
                <th style="width: 5%;">OderID</th>
                <th style="width: 5%;">AccountID</th>
                <th style="width: 10%;">Total Price</th>
                <th style="width: 15%;">Date Created</th>
                <th style="width: 25%;">Consignee Name</th>
                <th style="width: 10%;">Status</th>
                <th style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody id="showlistbill">
                    <!-- Show list account -->
            </tbody>
        </table>
    </div>  
    <div class="pagination-bill">
        <div id="showpagination-listbill">
            <!-- show pagination -->
        </div>
  </div>
</div>
<script src="../../controller/pagination_listbill.js"></script>
<script src="../../controller/orderstatus.js"></script>
<!-- <script src="../../controller/deleteaccount.js"></script> -->