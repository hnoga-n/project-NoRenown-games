<div class="main">
  <div class="title">
    <span>Games</span>
  </div>
  <div class="nav-bar">
    <div class="search">
      <input type="search" placeholder="Search">
    </div>
    <div class="selection">
      <input class="glass-card" type="search" placeholder="Genres.." onkeyup="showcategory(this.value)">
      <i class="fa-sharp fa-solid fa-caret-down"></i>
      <div class="dropdown-category">
        <ul class="category-list" id='showcategory'>
        <?php
          include 'connect.php';
          $sql = "SELECT DISTINCT (gcategory) 
          FROM games
          ORDER BY gcategory asc";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              echo "<li>".$row['gcategory']."</li>";
            }
          }
         ?> 
        </ul>
      </div>
    </div>
    <div class="button">
      <a href="">
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
      <tbody>
        <tr>
          <td>01</td>
          <td>Enden rings</td>
          <td>Fighting</td>
          <td>20.00$</td>
          <td>50</td>
          <td>20%</td>
          <td>
            <img src="./assets/img/genshinSlideShow.jpg" alt="">
          </td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </td>
          <td>
            <button>Edit</button>
            <br>
            <br>
            <button>Delete</button>
          </td>
        </tr>
        <tr>
          <td>01</td>
          <td>Enden rings</td>
          <td>Fighting</td>
          <td>20.00$</td>
          <td>50</td>
          <td>20%</td>
          <td>
            <img src="./assets/img/genshinSlideShow.jpg" alt="">
          </td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </td>
          <td>
            <button>Edit</button>
            <br>
            <br>
            <button>Delete</button>
          </td>
        </tr>
        <tr>
          <td>01</td>
          <td>Enden rings</td>
          <td>Fighting</td>
          <td>20.00$</td>
          <td>50</td>
          <td>20%</td>
          <td>
            <img src="./assets/img/genshinSlideShow.jpg" alt="">
          </td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </td>
          <td>
            <button>Edit</button>
            <br>
            <br>
            <button>Delete</button>
          </td>
        </tr>
        <tr>
          <td>01</td>
          <td>Enden rings</td>
          <td>Fighting</td>
          <td>20.00$</td>
          <td>50</td>
          <td>20%</td>
          <td>
            <img src="./assets/img/genshinSlideShow.jpg" alt="">
          </td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </td>
          <td>
            <button>Edit</button>
            <br>
            <br>
            <button>Delete</button>
          </td>
        </tr>
        <tr>
          <td>01</td>
          <td>Enden rings</td>
          <td>Fighting</td>
          <td>20.00$</td>
          <td>50</td>
          <td>20%</td>
          <td>
            <img src="./assets/img/genshinSlideShow.jpg" alt="">
          </td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </td>
          <td>
            <button>Edit</button>
            <br>
            <br>
            <button>Delete</button>
          </td>
        </tr>
        <tr>
          <td>01</td>
          <td>Enden rings</td>
          <td>Fighting</td>
          <td>20.00$</td>
          <td>50</td>
          <td>20%</td>
          <td>
            <img src="./assets/img/genshinSlideShow.jpg" alt="">
          </td>
          <td>
          <label class="switch">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
          </td>
          <td>
            <button>Edit</button>
            <br>
            <br>
            <button>Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

  </div>

  <div class="pagination">
    <div>
      <input type="button" value="&laquo;">
      <input type="button" class="pageNum" value="1">
      <input type="button" class="pageNum" value="1">
      <input type="button" class="pageNum" value="1">
      <input type="button" class="pageNum" value="1">
      <input type="button" value="&raquo;">
    </div>
  </div>
</div>