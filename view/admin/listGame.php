<div class="main">
  <div class="title">
    <span>Games</span>
  </div>
  <div class="nav-bar">
    <div class="search">
      <input type="search" placeholder="Search" id="searchgames" onkeyup="showlistgame(1,document.getElementById('gcategory').value,this.value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
    </div>
    <div class="selection">
      <select name="category" id="gcategory" onchange="showlistgame(1,this.value,document.getElementById('searchgames').value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
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
    <div class="price-filter">
      <span>Between</span>
      <input type="number" step="0.01" id="pfrom" onkeyup="showlistgame(1,document.getElementById('gcategory').value,document.getElementById(`searchgames`).value,this.value,document.getElementById('pto').value)">&nbsp;
      <span>$</span>&nbsp;
      <span>and</span>&nbsp;
      <input type="number" step="0.01" id="pto" onkeyup="showlistgame(1,document.getElementById('gcategory').value,document.getElementById(`searchgames`).value,document.getElementById('pfrom').value,this.value)">&nbsp;
      <span>$</span>
    </div>
    <div class="button">
      <a href="editgame.php">
        <button>
          <i class="fa-solid fa-plus"></i>
          <span>Add</span>
        </button>
      </a>
    </div>
  </div>
  <div class="listgames">
    <table>
      <thead>
        <tr>
          <th style="width: 5%;">ID</th>
          <th style="width: 30%;">Name</th>
          <th style="width: 10%;">Genres</th>
          <th style="width: 5%;">Price</th>
          <th style="width: 5%;">Quantity</th>
          <th style="width: 5%;">Discount</th>
          <th style="width: 25%;">Image</th>
          <th style="width: 5%;">Trending</th>
          <th style="width: 10%;">Action</th>
        </tr>
      </thead>
      <tbody id="showlistgame">
        <!-- Show list games -->
      </tbody>
    </table>
  </div>
  <div class="pagination">
    <div id="showpagination">
      <!-- show pagination -->
    </div>
  </div>
</div>


<div class="message" id="mess">
  <div class="message-box">
    <div class="message-header">
      <span class="close" onclick="document.getElementById('mess').style.display = 'none'">&times;</span>
      <h2>Notification</h2>
    </div>
    <div class="message-body">
      <p>Some text in the Modal Body</p>
      <p>Some other text...</p>
    </div>
    <div class="message-footer">
      <h3>Modal Footer</h3>
    </div>
  </div>
</div>