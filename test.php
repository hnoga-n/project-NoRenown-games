<?php
include './model/connect.php';

/* $sql = $conn->prepare("INSERT INTO games (gname,gcategory,gprice,gdiscount,gimg) VALUES (?,?,?,?,?)");
$sql = $conn->prepare("INSERT INTO game_detail (gdt_id,about,cfg_os,cfg_processor,cfg_graphics,cfg_storage) VALUES (?,?,?,?,?,?)");
 */
/* $sql = $conn->prepare("UPDATE games SET gquantity = (?) WHERE gid = (?)");
for ($i = 1; $i <= 112; $i++) {
  $rand = rand(30, 50);
  $sql->bind_param("ii", $rand, $i);
} */


/* $imgUrl = $_GET['imgUrl'];
$index = (int)$_GET['index'];
$nameImg = "{$_GET['nameImg']}.jpg";
$title = $_GET['title'];
*/

// $about = $_GET['descript'];
// $os = $_GET['os'];
// $processor = $_GET['graphics'];
// $graphics = $_GET['processor'];
// $storage = $_GET['storage'];
// $screenshot1 = $_GET['screenshot1'];
// $screenshot2 = $_GET['screenshot2'];
// $screenshot3 = $_GET['screenshot3'];
// $screenshot4 = $_GET['screenshot4'];
// $index = (int)$_GET['index']-1;
// $video = $_GET['video'];

/* $stmt = $conn->prepare("SELECT about FROM game_detail WHERE gdt_id = ?");
$stmt->bind_param("i",$index);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$row = $result->fetch_assoc(); // fetch data  

echo $about . " ???????? " . $row['about']; */
// echo $index;
// echo "$about,$os,$processor,$graphics,$storage,$screenshot1,$screenshot2,$screenshot3,$screenshot4,$index";

// echo $about;
// Remote image URL
// $url = 'http://www.example.com/remote-image.png';

// Image path
// $img = "./assets/img/{$name}.jpg";

// Save image 
// file_put_contents($img, file_get_contents($imgUrl));


/* $stmt = $conn->prepare("UPDATE games SET gimg = ?, gname = ? WHERE gid = ?");
$stmt->bind_param("ssi",$nameImg,$title,$index); */

//all
/* $stmt = $conn->prepare("UPDATE game_detail SET about = ?, cfg_os = ?, cfg_processor = ?, cfg_graphics = ?, cfg_storage = ?, screenshot1 = ?, screenshot2 = ?, screenshot3 = ?, screenshot4 = ? WHERE gdt_id = ?");
$stmt->bind_param("sssssssssi",$about,$os,$processor,$graphics,$storage,$screenshot1,$screenshot2,$screenshot3,$screenshot4,$index);
 */

 //system require
/* $stmt = $conn->prepare("UPDATE game_detail SET cfg_os = ?, cfg_processor = ?, cfg_graphics = ?, cfg_storage = ? WHERE gdt_id = ?");
$stmt->bind_param("ssssi",$os,$processor,$graphics,$storage,$index);
 */

//screenshot
/* $stmt = $conn->prepare("UPDATE game_detail SET screenshot1 = ?, screenshot2 = ?, screenshot3 = ?, screenshot4 = ? WHERE gdt_id = ?");
$stmt->bind_param("ssssi",$screenshot1,$screenshot2,$screenshot3,$screenshot4,$index);
 */

/* $stmt = $conn->prepare("UPDATE game_detail SET trailer = ? WHERE gdt_id = ?");
$stmt->bind_param("si",$video,$index);
 */

 //about
/* $stmt = $conn->prepare("UPDATE game_detail SET about = ? WHERE gdt_id = ?");
$stmt->bind_param("si",$about,$index);*/


/* $stmt->execute();
$stmt->close();
$conn->close();  */
?>

<?php
// Define the HTML code to be echoed
$html_code = '<div id="container">
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
    <div class="import_money">
      <div class="content">
        <div class="text">Import money</div>
        <div>
          <div class="number" id="import-money">$0</div>
          <i class="fa-solid fa-sack-dollar"></i>
        </div>
      </div>
    </div>
    <div class="import_quantity">
      <div class="content">
        <div class="text">Import quantity</div>
        <div>
          <div class="number" id="import-quantity">$0</div>
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
      <label>|  Category</label>
      <select name="categoryValue" id="category">';
      
      include '../../model/connect.php';
      $sql = "SELECT DISTINCT (gcategory) 
        FROM games
        ORDER BY gcategory ASC";
      $result = $conn->query($sql);
      $html_code .= "<option value='all' selected>All</option><br>";
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          $html_code .= "<option value='" . $row['gcategory'] . "'>" . $row['gcategory'] . "</option><br>";
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
      <button id="btn-filter" title="Filter"><i class="fa-solid fa-magnifying-glass"></i></button>
      <button id="btn-return" title="Return"><i class="fa-solid fa-rotate-right"></i></button>
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

  <script src="../../controller/showListGamesSold.js"></script>
</div>';

// Echo the HTML code to the browser
echo $html_code;
?>