<form class="main" action="../../model/importHandle.php?query=import" method="POST">
  <?php
  if (isset($_SESSION['message'])) {
    $data = "
      <div class='big-message'>
        <span>" . $_SESSION['message'] . "</span>
      </div>";
    echo $data;
    unset($_SESSION['message']);
  }
  ?>

  <div class="general-and-import-card">
    <!-- general infor -->
    <div class="general-info">
      <!-- <div class="title">
        <span>Import information</span>
      </div>
      <div class="form-general-div">
        <div>
          <span>Import ID:</span>
        </div>
        <div>
          <input id="importID" name="importID" type="text" value="1" readonly>
        </div>
      </div>
      <div class="form-general-div">
        <div>
          <span>Account ID:</span>
        </div>
        <div>
          <input id="import-account-ID" name="import_account_ID" type="text" value="2" readonly>
        </div>
      </div>
      <div class="form-general-div">
        <div>
          <span>Date create :</span>
        </div>
        <div>
          <input id="import-date-create" name="import_date_create" type="text" value="3" readonly>
        </div>
      </div>
      <div class="form-general-div">
        <div>
          <span>Total price :</span>
        </div>
        <div>
          <input id="import-total-price" name="import_total_price" type="text" value="2" readonly>
        </div>
      </div>

      <div>
        <div class="message-container">
          <span id="message"></span>
        </div>
      </div> -->

    </div>

    <!-- list game card -->
    <div class="list-import-card">
      <div class="title">
        <span>Chose products</span>
      </div>
      <table>
        <thead>
          <tr>
            <th style="width: 5%;">ID</th>
            <th style="width: 40%;">Name</th>
            <th style="width: 10%;">Price</th>
            <th style="width: 10%;">Current quantity</th>
            <th style="width: 20%;">Import quantity</th>
            <th style="width: 10%;">Supplier</th>
            <th style="width: 5%;">Del</th>
          </tr>
        </thead>

        <tbody id="showListCardImp">

          <!-- Show list games -->
          <!-- <tr>
            <td>1</td>
            <td>Elden ring</td>
            <td>69.3</td>
            <td>69</td>
            <td><input type="number" name="elden ring" id=""></td>
            <td><select name="supplier" id="supply">
                <option value="square enix">square enix</option>
                <option value="epic games">epic games</option>
                <option value="fromsoftware">fromsoftware</option>
              </select>
            </td>
            <td>
              <div class="delete-button">Del</div>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>

  </div>


  <div class="listProduct">
    <div class="title">
      <span>Games</span>
    </div>
    <div class="nav-bar">
      <div class="search">
        <input type="search" placeholder="Search" id="searchgames" onkeyup="showlistgameImp(1,document.getElementById('gcategory').value,this.value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
      </div>
      <div class="selection">
        <select name="category" id="gcategory" onchange="showlistgameImp(1,this.value,document.getElementById('searchgames').value,document.getElementById('pfrom').value,document.getElementById('pto').value)">
          <?php
          include '../../model/connect.php';
          $sql = "SELECT *
          FROM genres WHERE genStatus=1";
          $result = $conn->query($sql);
          echo "<option value='all' selected>All</option><br>";
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
        <input type="number" step="0.01" id="pfrom" onkeyup="showlistgameImp(1,document.getElementById('gcategory').value,document.getElementById(`searchgames`).value,this.value,document.getElementById('pto').value)">&nbsp;
        <span>$</span>&nbsp;
        <span>and</span>&nbsp;
        <input type="number" step="0.01" id="pto" onkeyup="showlistgameImp(1,document.getElementById('gcategory').value,document.getElementById(`searchgames`).value,document.getElementById('pfrom').value,this.value)">&nbsp;
        <span>$</span>
      </div>
      <?php
      include "../../model/connect.php";
      include "../../model/function_employee.php";
      $accountFeatures = json_decode($features_arr[5], true);
      if ($accountFeatures["VIEW IMPORT DETAIL"] == 1) {
        echo '
              <a href="./importList.php?page=import" class="button">
                  <div>
                    <span>Invoices</span>
                  </div>
              </a>
              
          ';
      }
      if ($accountFeatures["IMPORT GAMES"] == 1) {
        echo '
              <div class="button">
                <a href="">
                  <button>
                    <span>Add</span>
                  </button>
                </a>
              </div>
          ';
      }
      ?>
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
            <th style="width: 30%;">Image</th>
            <th style="width: 25%;">Choose</th>

          </tr>
        </thead>
        <tbody id="showlistgameImp">
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
</form>

<script src="../../controller/importListGame.js"></script>