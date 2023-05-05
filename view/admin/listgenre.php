<div class="main">
  <div class="title">
    <span>Genres</span>
  </div>
  <div class="nav-bar">
    <div class="search">
      <input type="search" placeholder="Search" onkeyup="showlistgenre(this.value)">
    </div>
    <?php
        include '../../model/connect.php';
        include '../../model/function_employee.php';
        $accountFeatures = json_decode($features_arr[8],true);
        if($accountFeatures["ADD GENRE"]==1) {
          echo "
          <div class='button'>
            <button onclick='document.getElementById(`id01`).style.display=`block`'>
              <span>Add</span>
            </button>
          </div>
          ";
        }
      ?>
    
  </div>
  <div class="listgames">
    <table>
      <thead>
        <tr>
          <th style="width: 10%;">Genre ID</th>
          <th style="width: 70%;">Genre name</th>
          <th style="width: 20%;">Action</th>
        </tr>
      </thead>
      <tbody id="showlistgenre">
        <!-- show list genre -->
      </tbody>
    </table>
  </div>
</div>

<div id="id01" class="modal1">
  <form class="modal-content animate" action="../../model/addGenre.php" method="post">
    <div class="form-div1">
      <span>Add genre</span>
    </div>
    <div class="form-div2">
      <input type="text" name="genName" required>
    </div>
    <div class="form-div3">
      <div>
        <button type="submit">Add</button>
      </div>
    </div>
  </form>
</div>

<div id="id012" class="modal2">
  <form class="modal-content animate" action="../../model/editGenre.php" method="post">
    <div class="form-div1">
      <span>Edit genre</span>
    </div>
    <div class="form-div2">
      <input type="text" name="genid" required id="edit-genID" readonly>
      <br>
      <br>
      <input type="text" name="genName" required id="edit-genName">
    </div>
    <div class="form-div3">
      <div>
        <button type="submit">Update</button>
      </div>
    </div>
  </form>
</div>
<script src="../../controller/pagination_listgenre.js"></script>