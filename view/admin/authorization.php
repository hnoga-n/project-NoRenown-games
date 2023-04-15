<div class="au_main">
    <div class="title">
        <span>Authorization</span>
        <?php
        include '../../model/connect.php';
        include '../../model/function_employee.php';
        $accountFeatures = json_decode($features_arr[4],true);
        if($accountFeatures["ADD AUTHORITY"]==1) {
          echo '
            <a href="./authorize.php?page=authorization">
                <button>Add group</button>
            </a>
          ';
        }
      ?>
    </div>
    <div class="author_group">
        <table>
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 25%;">Date created</th>
                    <th style="width: 25%;">Date updated</th>
                    <th style="width: 25%;">Action</th>
                </tr>
            </thead>
            <tbody class="auth_table_body">
                <!--  <tr>
                    <td style="width: 5%;">1</td>
                    <td style="width: 20%;">Admin</td>
                    <td style="width: 25%;">10/10/2020</td>
                    <td style="width: 25%;">10/10/2020</td>
                    <td style="width: 25%;">
                        <a href="./authorize.php?page=authorization&grid=1">
                            <button>Edit</button>
                        </a>
                        <button>Delete</button>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
</div>
<script src="../../controller/authority.js"></script>