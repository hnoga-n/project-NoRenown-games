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
    <!-- <div class="import-containers">
      <div class="infor">
        <div class="id">
          <span>Import ID:</span>
          <span>1</span>
        </div>
        <div class="Account">
          <span>Account ID:</span>
          <span>1</span>
        </div>
        <div class="Date">
          <span>Data create: </span>
          <span>03/03/2023</span>
        </div>
      </div>
      <div class="list-game-imported">
        <div class="game-imported-header">
          <div class="gid-import-header">GID</div>
          <div class="gname-import-header">Name</div>
          <div class="quantity-import-header">QUANTITY</div>
          <div class="price-import-header">PRICE</div>
          <div class="supp-import-header">SUPPLIER</div>
        </div>
        <div class="game-imported">
          <div class="gid-import">1</div>
          <div class="gname-import">Genshin Impact</div>
          <div class="quantity-import">12</div>
          <div class="price-import">69.3$</div>
          <div class="supp-import">Nintendo</div>
        </div>
      </div>

      <div class="price-view">
        <div class="total-price">
          <span>TOTAL PRICE: </span>
          <span>159 $ </span>
        </div>
      </div>
    </div> -->
  </div>
  <div class="pagination-container">
    <div class="pagination" id="showPagination">
      <!-- page -->
    </div>
  </div>
</div>
<script src="../../assets/js/leftmenu.js"></script>
<script src="../../controller/importList.js"></script>