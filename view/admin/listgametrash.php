<div class="main">
  <div class="title">
    <span>Trash Game</span>
  </div>
  <div class="nav-bar">
    <div class="search">
      <input type="search" placeholder="Search" id="searchgames" onkeyup="showlistgame(1,document.getElementById('gcategory').value,this.value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
    </div>
    <div class="selection">
      <select name="category" id="gcategory" onchange="showlistgame(1,this.value,document.getElementById('searchgames').value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
        <?php
        include '../../model/connect.php';
        $sql = "SELECT *
          FROM genres
          WHERE genStatus=1
          ORDER BY genID ASC";
        $result = $conn->query($sql);
        echo "<option value='0' selected>All</option><br>";
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['genID'] . "'>" . $row['genName'] . "</option><br>";
          }
        }
        $conn->close();
        ?>
      </select>
    </div>
    <div class="price-filter">
      <span>Between</span>
      <input type="number" step="0.01" id="pfrom" onkeyup="showlistgame(1,document.getElementById('gcategory').value,document.getElementById(`searchgames`).value,this.value,document.getElementById('pto').value)">&nbsp;
      <span>$</span>&nbsp;
      <span>and</span>&nbsp;
      <input type="number" step="0.01" id="pto" onkeyup="showlistgame(1,document.getElementById('gcategory').value,document.getElementById(`searchgames`).value,document.getElementById('pfrom').value,this.value)">&nbsp;
      <span>$</span>
    </div>
  </div>
  <div class="listgames">
    <table>
      <thead>
        <tr>
          <th style="width: 5%;">ID</th>
          <th style="width: 30%;">Name</th>
          <th style="width: 15%;">Genres</th>
          <th style="width: 5%;">Price</th>
          <th style="width: 5%;">Quantity</th>
          <th style="width: 5%;">Discount</th>
          <th style="width: 25%;">Image</th>
          <th style="width: 10%;">Action</th>
        </tr>
      </thead>
      <tbody id="showlistgame">
        <!-- Show list games -->
      </tbody>
    </table>
  </div>
  <div class="pagination">
    <div id="showpagination-trash">
      <!-- show pagination -->
    </div>
  </div>
</div>

<script src="../../controller/pagination_listgametrash.js"></script>