<?php 
    // echo $_GET['case'];
    include_once "connect.php";
    $accounts = "SELECT accid FROM account";
    $result_accounts = $conn->query($accounts);

    $games = "SELECT gid FROM games";
    $result_games = $conn->query($games);

    $trash_games = "SELECT gid FROM games WHERE visible = 0";
    $result_trash_games = $conn->query($trash_games);

    $invoices = "SELECT orderID FROM invoice";
    $result_invoices = $conn->query($invoices);

    $authorizations = "SELECT groupID FROM auth_group";
    $result_authorizations = $conn->query($authorizations);

    $html_code = '';
    switch ($_GET['case']) {
        case "Overview":
            echo '
           
            <div class="statistic-container-header">

            <div class="sales">
              <div class="content">
                <div class="text">Accounts</div>
                <div>
                  <div class="number" id="sum_sold_quantity">'.  $result_accounts->num_rows .'</div>
                  <i class="fa-solid fa-users-gear"></i>
                </div>
              </div>
            </div>
            <div class="earning">
              <div class="content">
                <div class="text">Invoices</div>
                <div>
                  <div class="number" id="import-money">'.  $result_invoices->num_rows .'</div>
                  <i class="fa-solid fa-barcode"></i>
                </div>
              </div>
            </div>
            <div class="import_money">
              <div class="content">
                <div class="text">Games</div>
                <div>
                  <div class="number" id="import-money">'.  $result_games->num_rows .'</div>
                  <i class="fa-solid fa-gamepad"></i>
                </div>
              </div>
            </div>
            <div class="import_quantity">
              <div class="content">
                <div class="text">Trash game</div>
                <div>
                  <div class="number" id="import-quantity">'.  $result_trash_games->num_rows .'</div>
                  <i class="fa-solid fa-trash-can"></i>
                </div>
              </div>
            </div>
            <div class="import_quantity">
              <div class="content">
                <div class="text">Authorizations</div>
                <div>
                  <div class="number" id="import-quantity">'.  $result_authorizations->num_rows .'</div>
                  <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
              </div>
            </div>
          </div>
        
        </div>
          ';
            break;
        case "Sold out":
            $html_code .= '
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
            </div>
          
            <div class="statistic-container-content">
              <div class="products-filter-besst-seller">
                <label>Top best seller</label>
                <input id="number-best-seller" value="0" type="number" min="0" max="20">
              </div>
          
              <div class="products-filter-category">
                <label>|  Category</label>
                <select name="categoryValue" id="category" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1; this.blur();">';
                
                include './connect.php';
                $sql = "SELECT DISTINCT (genreID),genName 
                  FROM games JOIN genres ON games.genreID = genres.genID 
                  ORDER BY genreID ASC";
                $result = $conn->query($sql);
                $html_code .= "<option value='all' selected>All</option><br>";
                if ($result->num_rows > 0) {
                  // output data of each row
                  while ($row = $result->fetch_assoc()) {
                    $html_code .= "<option value='" . $row['genreID'] . "'>" . $row['genName'] . "</option><br>";
                  }
                }
                $conn->close();
                
                $html_code .= '</select>   
              </div>
          
              <div class="products-filter-date">
                <label>|  Date</label>
                <input id="date-start" type="date" value="" required/>
                <label>to</label>
                <input id="date-end" type="date" value="" required/>
                <button id="btn-return" title="Refresh"><i class="fa-solid fa-rotate-right"></i></button>
              </div>
          
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
            
            
          ';
          echo $html_code;
          break;
        case "Import":
          $html_code .= '
          <div class="statistic-container-header">
            <div class="import_quantity">
              <div class="content">
                <div class="text">Import quantity</div>
                <div>
                  <div class="number" id="sum_sold_quantity">0</div>
                  <i class="fa-solid fa-cart-shopping"></i>
                </div>
              </div>
            </div>
            <div class="import_money">
              <div class="content">
                <div class="text">Import money</div>
                <div>
                  <div class="number" id="revenue">$0</div>
                  <i class="fa-solid fa-sack-dollar"></i>
                </div>
              </div>
            </div>
          </div>
        
          <div class="statistic-container-content">
            <div class="products-filter-besst-seller">
              <label>Top most import</label>
              <input id="number-best-seller" value="0" type="number" min="0" max="20">
            </div>
        
            <div class="products-filter-category">
              <label>|  Category</label>
              <select name="categoryValue" id="category" onfocus="this.size=5;" onblur="this.size=1;" onchange="this.size=1; this.blur();">';
              
              include './connect.php';
              $sql = "SELECT DISTINCT (genreID),genName 
                FROM games JOIN genres ON games.genreID = genres.genID 
                ORDER BY genreID ASC";
              $result = $conn->query($sql);
              $html_code .= "<option value='all' selected>All</option><br>";
              if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $html_code .= "<option value='" . $row['genreID'] . "'>" . $row['genName'] . "</option><br>";
                }
              }
              $conn->close();
              
              $html_code .= '</select>   
            </div>
        
            <div class="products-filter-date">
              <label>|  Date</label>
              <input id="date-start" type="date" value="" required/>
              <label>to</label>
              <input id="date-end" type="date" value="" required/>
              <button id="btn-return" title="Refresh"><i class="fa-solid fa-rotate-right"></i></button>
            </div>
        
            <div class="listGamesSold">
            <table>
              <thead>
                <tr>
                  <th style="width: 10%;">ID</th>
                  <th style="width: 30%;">Name</th>
                  <th style="width: 15%;">Genres</th>
                  <th style="width: 10%;">Price</th>
                  <th style="width: 25%;">Image</th>
                  <th style="width: 10%;">Import quantity</th>
                </tr>
              </thead>
              <tbody id="showListGamesSold">
                <!-- Show list games -->
                
              </tbody>
            </table>
          </div>  
          </div>
          
          
        ';
        echo $html_code;
          break;
        case "Customer":
          $html_code .= '
          <div class="statistic-container-content">
            <div class="products-filter-besst-seller">
              <label>Top most customer buying</label>
              <input id="number-best-seller" value="0" type="number" min="0" max="20">
            </div>
        
            <div class="products-filter-date">
              <label>|  Date</label>
              <input id="date-start" type="date" value="" required/>
              <label>to</label>
              <input id="date-end" type="date" value="" required/>
              <button id="btn-return" title="Refresh"><i class="fa-solid fa-rotate-right"></i></button>
            </div>
        
            <div class="listGamesSold">
            <table>
              <thead>
                <tr>
                  <th style="width: 5%;">ID</th>
                  <th style="width: 30%;">Name</th>
                  <th style="width: 30%;">Email</th>
                  <th style="width: 15%;">Buy quantity</th>
                  <th style="width: 20%;">Spend</th>
                </tr>
              </thead>
              <tbody id="showListGamesSold">
                <!-- Show list games -->
                
              </tbody>
            </table>
          </div>  
          </div>';
        echo $html_code;  
          break;  
    }
