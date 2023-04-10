<?php
include '../admin/head1.php';
include '../admin/leftmenu.php';
include '../../model/connect.php';
?>
<div class="main-import">
  <div class="back-to-import">
    <span>Back</span>
  </div>
  <div class="title">IMPORT LIST</div>
  <div class="nav">
    <input type="date" id="date-start" placeholder="Search date start" value="2020-01-01" onchange="searchImportList(this.value,document.getElementById('date-end').value,document.getElementById('search-with-account').value,document.getElementById('price-from').value,document.getElementById('price-to').value)"></input>
    <input type="date" id="date-end" placeholder="Search date end" value="2030-01-01" onchange="searchImportList(document.getElementById('date-start').value,this.value,document.getElementById('search-with-account').value,document.getElementById('price-from').value,document.getElementById('price-to').value)"></input>
    <input id="search-with-account" placeholder="Account ID" value="" onchange="searchImportList(document.getElementById('date-start').value,document.getElementById('date-end').value,this.value,document.getElementById('price-from').value,document.getElementById('price-to').value)"></input>
    <input type="number" id="price-from" placeholder="Price from" value="0" onchange="searchImportList(document.getElementById('date-start').value,document.getElementById('date-end').value,document.getElementById('search-with-account').value,this.value,document.getElementById('price-to').value)">
    <input type="number" id="price-to" placeholder="Price to" value="100000" onchange="searchImportList(document.getElementById('date-start').value,document.getElementById('date-end').value,document.getElementById('search-with-account').value,document.getElementById('price-from').value,this.value)">
  </div>
  <div class="message-container">
    <span id="message"></span>
  </div>
  <div class="import-container-outside">
    <table>
      <thead>
        <tr>
          <th style="width: 20%;">ID</th>
          <th style="width: 20%;">Account ID</th>
          <th style="width: 20%;">Date create</th>
          <th style="width: 20%;">Total price</th>
          <th style="width: 20%;">View</th>
        </tr>
      </thead>
      <tbody id="show-list-import">
        <!-- Show list games -->
        <!-- <tr>
          <td style="width:20%;">1</td>
          <td style="width: 20%;">2</td>
          <td style="width: 20%;">03/03/03</td>
          <td style="width:20%;">679.32</td>
          <td>
            <div class='view-button'>Select</div>
          </td>
        </tr> -->

      </tbody>
    </table>
  </div>
  <div class="pagination-container">
    <div class="pagination" id="showPagination">
      <!-- page -->
    </div>
  </div>
</div>
<div class="import-containers" style="display:none;">

</div>
<script src="../../assets/js/leftmenu.js"></script>
<script src="../../controller/importList.js"></script>