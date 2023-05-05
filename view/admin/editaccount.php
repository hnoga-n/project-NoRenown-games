<?php
include '../admin/head1.php';
include '../admin/leftmenu.php';
include '../../model/connect.php';
if (isset($_GET['accid'])) {
    $accid = $_GET['accid'];
    $account = array();
    $sql = "SELECT accid,account.userID,typeName,users.usertypeID,fullname,phone,address,mail,passwd,account.date_create,groupName,account.groupID,acc_status
                FROM (users JOIN usertype ON users.usertypeID = usertype.usertypeID) JOIN (account LEFT JOIN auth_group ON account.groupID = auth_group.groupID) ON users.userID = account.userID
                WHERE accid = $accid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $account = array(
                'accid' => $row['accid'],
                'userid' => $row['userID'],
                'usertypeID' => $row['usertypeID'],
                'typename' => $row['typeName'],
                'fullname' => $row['fullname'],
                'phone' => $row['phone'],
                'address' => $row['address'],
                'mail' => $row['mail'],
                'passwd' => $row['passwd'],
                'date_create' => $row['date_create'],
                'groupname' => $row['groupName'],
                'groupid' => $row['groupID'],
                'acc_status' => $row['acc_status']
            );
        }
    }
} else {
    $account = array();
}

?>
<div class="editaccount-modalbox">
    <div class='modal-header'>
        <h2><?= !empty($_GET['accid']) ? 'Edit account' : 'Add account' ?></h2>
    </div>
    <div class="modal-form">

        <form action="<?= !empty($account) ? "../../model/edit_account.php?userid=" . $account['userid'] : "../../model/add_account.php" ?>" onsubmit="return checkaddaccount(<?= !empty($account) ? 1 : 0 ?>)" method="post">
            <div class="form-div" <?= !empty($account) ? '' : 'style="display:none;"' ?>>
                <div>
                    <span>Account ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?= !empty($account) ? $account['accid'] : '' ?>">
                </div>
            </div>
            <div class="form-div" <?= !empty($account) ? '' : 'style="display:none;"' ?>>
                <div>
                    <span>User ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?= !empty($account) ? $account['userid'] : '' ?>">
                </div>
            </div>
            <div class="form-div" <?= !empty($account) ? '' : 'style="display:none;"' ?>>
                <div>
                    <span>User type:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?= !empty($account) ? $account['typename'] : '' ?>">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Full name:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($account) ? $account['fullname'] : '' ?>" name="fullname">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Phone:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($account) ? $account['phone'] : '' ?>" name="phone">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Address:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($account) ? $account['address'] : '' ?>" name="address">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Mail:</span>
                </div>
                <div>
                    <input type="email" value="<?= !empty($account) ? $account['mail'] : '' ?>" name="mail" <?= !empty($account) ? 'readonly' : '' ?>>
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Password:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($account) ? $account['passwd'] : '' ?>" name="passwd">
                </div>
            </div>
            <div class="form-div" <?= !empty($account) ? '' : 'style="display:none;"' ?>>
                <div>
                    <span>Date create:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?= !empty($account) ? $account['date_create'] : '' ?>">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Group:</span>
                </div>
                <div>
                    <select name="groupid">
                        <?=
                        $sql1 = "SELECT groupID,groupName
                                    FROM auth_group";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                            while ($row = $result1->fetch_assoc()) {
                                if ($account['usertypeID'] == 1 && $row['groupID'] == 2) {
                                    $select = "<option value='" . $row['groupID'] . "' selected>" . $row['groupName'] . "</option>&nbsp;&nbsp;";
                                    break;
                                } else if ($account['usertypeID'] == 2 && $row['groupID'] == 2) {
                                    continue;
                                } else {
                                    if ($row['groupID'] == $account['groupid']) {
                                        $select .= "<option value='" . $row['groupID'] . "' selected>" . $row['groupName'] . "</option>&nbsp;&nbsp;";
                                    } else
                                        $select .= "<option value='" . $row['groupID'] . "'>" . $row['groupName'] . "</option>&nbsp;&nbsp;";
                                }
                            }
                        }
                        echo $select;
                        $conn->close();
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-div" <?= !empty($account) ? '' : 'style="display:none;"' ?>>
                <div>
                    <span>Status:</span>
                </div>
                <div>
                    <label class='switch'>
                        <input type='checkbox' <?= ($account['acc_status'] == 1) ? 'checked' : '' ?> name="acc_status">
                        <span class='slider round'></span>
                    </label>
                </div>

            </div>
            <div class="form-button">
                <div>
                    <button type="submit"><?= !empty($_GET['accid']) ? 'Update' : 'Add' ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="../../assets/js/leftmenu.js"></script>
<script src="../../assets/js/checkaddaccount.js"></script>