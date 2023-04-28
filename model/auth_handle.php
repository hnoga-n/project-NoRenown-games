<?php
include "../model/connect.php";
include "../model/function_employee.php";
$accountFeatures = json_decode($features_arr[4], true);
switch ($_GET['query']) {
  case 'listgroup':
    getListGroup($accountFeatures["EDIT AUTHORITY"], $accountFeatures["DELETE AUTHORITY"]);
    break;
  case 'addgroup':
    getGeneralGroupInformation();
    getListFeature();
    break;
    // in case press create group button
  case 'submited':
    createGroup();
    break;
  case 'editgroup':
    $gridID = $_GET['grid'];
    getGeneralGroupInformationEdit($gridID);
    getListFeatureEdit($gridID);
    break;
  case 'deletegroup':
    $gridID = $_GET['grid'];
    deleteGroup($gridID);
    break;
}


function getListGroup($edit, $delete)
{
  include "../model/connect.php";
  $sql = "SELECT * FROM auth_group";

  $result = $conn->query($sql);
  $data = '';
  while ($row = $result->fetch_assoc()) {
    if ($row['groupID'] == 1 || $row['groupID'] == 2) {
      $data .= ' 
        <tr>
          <td style="width: 5%;">' . $row['groupID'] . '</td>
          <td style="width: 20%;">' . $row['groupName'] . '</td>
          <td style="width: 25%;">' . $row['date_create'] . '</td>
          <td style="width: 25%;">' . $row['last_modify'] . '</td>
          <td style="width: 25%;">
            Nothing
          </td>
      </tr>
  ';
    } else {
      $data .= ' 
          <tr>
            <td style="width: 5%;">' . $row['groupID'] . '</td>
            <td style="width: 20%;">' . $row['groupName'] . '</td>
            <td style="width: 25%;">' . $row['date_create'] . '</td>
            <td style="width: 25%;">' . $row['last_modify'] . '</td>
            <td style="width: 25%;">';
      if ($edit == 1) {
        $data .= '<a href="./authorize.php?page=authorization&grid=' . $row['groupID'] . '">
                        <button>Edit</button>
                      </a>';
      }
      if ($delete == 1) {
        $data .= '<button onclick="deleteGroup(' . $row['groupID'] . ')">Delete</button>';
      }
      $data .= "</td>
          </tr>";
    }
  }
  echo $data;
  $conn->close();
}

// get groupID, groupName... for add  
function getGeneralGroupInformation()
{
  include "../model/connect.php";
  $sql = "SELECT * FROM auth_group ORDER BY groupID DESC";
  $row = $conn->query($sql)->fetch_assoc();
  $data = '
                <div class="form-general-div">
                    <div>
                        <span>Group name:</span>
                    </div>
                    <div>
                        <input id="group-name" name="groupName" type="text" required>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Date created:</span>
                    </div>
                    <div>
                        <input id="group-date-create" name="dateCreate" type="text" value="' . date("Y/m/d") . '" readonly>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Date updated:</span>
                    </div>
                    <div>
                        <input id="group-date-create" name="dateModify" type="text"  value="' . date("Y/m/d") . '" readonly>
                    </div>
                </div> ###
  ';
  echo $data;
  $conn->close();
}

// get groupID, groupName... for edit  
function getGeneralGroupInformationEdit($groupID)
{
  include "../model/connect.php";
  $general_info = $conn->query("SELECT * FROM auth_group WHERE groupID = $groupID");
  $result = $general_info->fetch_assoc();
  $data = '
  <div class="form-general-div">
                    <div>
                        <span>Group ID:</span>
                    </div>
                    <div>
                        <input id="groupID" name="groupID" type="text" value="' . $result['groupID'] . '" readonly>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Group name:</span>
                    </div>
                    <div>
                        <input id="group-name" name="groupName" type="text" value="' . $result['groupName'] . '" required>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Date created:</span>
                    </div>
                    <div>
                        <input id="group-date-create" name="dateCreate" type="text" value="' . $result['date_create'] . '" readonly>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Date updated:</span>
                    </div>
                    <div>
                        <input id="group-date-create" name="dateModify" type="text"  value="' . date("Y/m/d") . '" readonly>
                    </div>
                </div> ###
  ';
  echo $data;

  $conn->close();
}

function getListFeatureEdit($groupID)
{
  include "../model/connect.php";
  $result1 = $conn->query("SELECT * FROM features "); // render feature table
  $result2 = $conn->query("SELECT * FROM features fe JOIN auth_group_detail au on fe.feaID=au.feaID WHERE groupID = $groupID"); // render small features
  $data = '';
  if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
      $data .= '
      <div class="authorize-card">
          <header>' . $row['feaName'] . '</header>';
      $result2->data_seek(0);
      while ($feaRow = $result2->fetch_assoc()) {
        if (($feaRow['feaID'] == $row['feaID']) && $feaRow['visible'] == 1) { // check which small feature belong to big feature

          $data .= '
          <div class="authorize-card-div">
            <div><label>' . $feaRow['action'] . '</label></div>
            <div>
                <label class="switch">
                    <input type="checkbox" name="' . $feaRow['action'] . '" class="feature-checkbox" value="' . $feaRow['action'] . '" checked>
                    <span class="slider round"></span>
                </label>
            </div>
          </div>';
        } else if (($feaRow['feaID'] == $row['feaID']) && $feaRow['visible'] == 0) {

          $data .= '
          <div class="authorize-card-div">
            <div><label>' . $feaRow['action'] . '</label></div>
            <div>
                <label class="switch">
                    <input type="checkbox" name="' . $feaRow['action'] . '" class="feature-checkbox" value="' . $feaRow['action'] . '">
                    <span class="slider round"></span>
                </label>
            </div>
          </div>';
        }
      }

      $data .= '</div>';
    }
    echo $data;
  }
}

function getListFeature()
{
  include "../model/connect.php";
  $result1 = $conn->query("SELECT * FROM features "); // render feature table
  $result2 = $conn->query("SELECT * FROM features fe JOIN auth_group_detail au on fe.feaID=au.feaID WHERE groupID = 1"); // render small features
  $data = '';
  if ($result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
      $data .= '
      <div class="authorize-card">
          <header>' . $row['feaName'] . '</header>';
      $result2->data_seek(0);
      while ($feaRow = $result2->fetch_assoc()) {
        if ($feaRow['feaID'] == $row['feaID']) { // check which small feature belong to big feature

          $data .= '
          <div class="authorize-card-div">
            <div><label>' . $feaRow['action'] . '</label></div>
            <div>
                <label class="switch">
                    <input type="checkbox" name="' . $feaRow['action'] . '" class="feature-checkbox" value="' . $feaRow['action'] . '">
                    <span class="slider round"></span>
                </label>
            </div>
          </div>';
        }
      }

      $data .= '</div>';
    }
    echo $data;
  }

  $conn->close();
}


function createGroup()
{
  /*   this function depends on groupID=1 aka admin auth . DO NOT MODIFY GROUPID=1*/
  include "../model/connect.php";
  if (!isset($_POST['groupID'])) {
    // insert data into auth group
    $group_name = $_POST['groupName'];
    $dateCreate = $_POST['dateCreate'];
    $dateModify = $_POST['dateModify'];

    $sql_group = $conn->prepare("INSERT INTO auth_group(groupName,date_create,last_modify	) VALUES (?,?,?)");
    $sql_group->bind_param("sss", $group_name, $dateCreate, $dateModify);

    if ($sql_group->execute()) {
      // insert data into auth detail
      $groupID = $conn->insert_id;
      $insert_sql = $conn->prepare("INSERT INTO auth_group_detail(groupID,feaID,action,visible) VALUES (?,?,?,?)");

      $actions = $conn->query("SELECT * FROM auth_group_detail WHERE groupID=1"); // get action data to compare and set visible
      $visible = 1;
      while ($row = $actions->fetch_assoc()) {
        $flag = 0; // checck if action had been insert
        $feaID = -1;
        $act = '';
        foreach ($_POST as $action => $val) {
          if ($action == 'groupID' || $action == 'groupName' || $action == 'dateCreate' || $action == 'dateModify') {
            continue;
          }
          $str_val  = trim($val);
          $str_row = trim($row['action']);
          if (strcmp($str_val, $str_row)  == 0) {
            $visible = 1;
            $flag = 1;
            echo   $groupID . "|||" . $row['feaID'] . "|||" . $row['action'] . "|||" . $val . "|||" . $visible;
            $insert_sql->bind_param("iisi", $groupID, $row['feaID'], $row['action'], $visible);
            $insert_sql->execute();
            break;
          } else {

            $feaID = $row['feaID'];
            $act = $row['action'];
          }
        }
        if ($flag == 0) {
          $visible = 0;
          $insert_sql->bind_param("iisi", $groupID, $feaID, $act, $visible);
          $insert_sql->execute();
        }
      }
    }

    $_SESSION['message'] = "add group authority successed";
    header('location: ../view/admin/authorize.php?page=authorization');
  } else {
    $groupID = $_POST['groupID'];
    $groupName = $_POST['groupName'];
    $lastModify =  $_POST['dateModify'];

    // update auth_group
    $sql_group = $conn->prepare("UPDATE  auth_group SET groupName = (?),last_modify = (?) WHERE groupID = " . $groupID . "");
    $sql_group->bind_param("ss", $groupName, $lastModify);
    $sql_group->execute();

    $group_data = $conn->query("SELECT * FROM auth_group_detail WHERE groupID = $groupID");
    $update_feature = $conn->prepare("UPDATE auth_group_detail SET visible=(?) WHERE groupID = $groupID AND action=(?)");

    while ($row = $group_data->fetch_assoc()) {
      $flag = 0; // checck if action had been insert
      $act = '';
      $visible = 0;
      foreach ($_POST as $action => $val) {
        if ($action == 'groupID' || $action == 'groupName' || $action == 'dateCreate' || $action == 'dateModify') {
          continue;
        }
        $str_val  = trim($val);
        $str_row = trim($row['action']);
        if (strcmp($str_val, $str_row)  == 0) {
          $flag = 1;
          $visible = 1;
          $update_feature->bind_param("is", $visible, $row['action']);
          $update_feature->execute();
          break;
        } else {
          $visible = 0;
        }
      }
      if ($flag == 0) {
        $update_feature->bind_param("is", $visible, $row['action']);
        $update_feature->execute();
      }
    }
    $_SESSION['message'] = "edit group authority successed";
    header('location: ../view/admin/authorize.php?page=authorization&grid=' . $groupID . '');
  }

  $conn->close();
}

function deleteGroup($groupID)
{
  include "../model/connect.php";
  if ($conn->query("UPDATE account SET groupID=NULL WHERE groupID=$groupID")) {
    if ($conn->query("DELETE FROM auth_group_detail WHERE groupID=$groupID")) {
      if ($conn->query("DELETE FROM auth_group WHERE groupID=$groupID")) {
        echo "delete successed";
      } else {
        echo "failed delete from group";
      }
    } else {
      echo "faild delete from auth group detail";
    }
  } else {
    echo "failed delete account groupid";
  }

  $conn->close();
  header('location: ../view/admin/employee.php?page=authorization');
}
