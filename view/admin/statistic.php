<?php 
  include_once "../../model/searchGenres.php";
?>
<html lang="en">
<body>
  <div class="statistic-container">
    <div class="statistic-container-header">
      <div class="sales">
        <div class="content">
          <div class="text">Sold quantity</div>
          <div>
            <div class="number" id="sum_sold_quantity">0</div>
            <i class="fa-solid fa-cart-shopping"></i>
          </div>
        </div>
      </div>
      <div class="earning">
        <div class="content">
          <div class="text">Revenue</div>
          <div>
            <div class="number" id="revenue">$0</div>
            <i class="fa-solid fa-sack-dollar"></i>
          </div>
        </div>
      </div>
      <div class="import-money">
        <div class="content">
          <div class="text">Import money</div>
          <div>
            <div class="number" id="import-money">$0</div>
            <i class="fa-solid fa-sack-dollar"></i>
          </div>
        </div>
      </div>
      <div class="profit">
        <div class="content">
          <div class="text">Profit</div>
          <div>
            <div class="number" id="profit">$0</div>
            <i class="fa-solid fa-arrow-trend-up"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="statistic-container-content">
      <div class="products-filter-besst-seller">
        <label>Top best seller</label>
        <input id="number-best-seller" value="0" type="number" min="0" max="20">
      </div>
      <div class="products-filter-category">
        <label>Category</label>
        <select name="categoryValue" id="category">
          <?php
            include '../../model/connect.php';
            $sql = "SELECT DISTINCT (gcategory) 
              FROM games
              ORDER BY gcategory ASC";
            $result = $conn->query($sql);
            echo "<option value='all' selected>All</option><br>";
            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['gcategory'] . "'>" . $row['gcategory'] . "</option><br>";
              }
            }
            $conn->close();
          ?>
        </select>
      </div>

      <div class="products-filter-date">
        <label>Date</label>
        <input id="date-start" type="date" value="" required/>
        <label>to</label>
        <input id="date-end" type="date" value="" required/>
        <button id="btn-filter" title="Filter"><i class="fa-solid fa-magnifying-glass"></i></button>
        <button id="btn-return" title="Return"><i class="fa-solid fa-rotate-right"></i></button>
    </div>
      <!-- <div class="chart">
            <canvas id="pie" style="width: inherit; height: inherit;margin: 0 auto;"></canvas>
        </div> -->
      <div class="listGamesSold">
        <table>
          <thead>
            <tr>
              <th style="width: 10%;">ID</th>
              <th style="width: 30%;">Name</th>
              <th style="width: 15%;">Genres</th>
              <th style="width: 10%;">Price</th>
              <th style="width: 25%;">Image</th>
              <th style="width: 10%;">Sold quantity</th>
            </tr>
          </thead>
          <tbody id="showListGamesSold">
            <!-- Show list games -->
            
          </tbody>
        </table>
      </div>  
  </div>
        

    </div>
    <div class="statistic-container-footer">

    </div>
  </div>

</body>

<script src="https://kit.fontawesome.com/f26ba754df.js" crossorigin="anonymous"></script>
<script src="../../assets/js/statistic.js"></script>
<script src="../../controller/showListGamesSold.js"></script>

</html>