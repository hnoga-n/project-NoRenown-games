<?php
include "../../model/connect.php";
$sql_account = "SELECT date_create,passwd,userID,mail FROM account WHERE accid={$_COOKIE['accountId']}";
$result = $conn->query($sql_account);
$account = $result->fetch_assoc();
$sql_user = "SELECT phone,address FROM users WHERE userID={$account['userID']}";
$result2 = $conn->query($sql_user);
$user_info = $result2->fetch_assoc();
?>
<div class="emain">
    <div class="top">
        <div class="t-img">
            <div>
            </div>
        </div>
        <div class="t-info">
            <div class="t-info-div">
                <div>
                    <span><?php echo $_COOKIE['fullname'] ?></span>
                </div>
                <div>
                    <span>Member since:<?= $account['date_create'] ?></span>
                </div>
            </div>

        </div>
    </div>
    <div class="bottom">
        <div class="bottom-div">
            <div class="b-title">
                <span>Profile</span>
            </div>
            <div class="b-input">
                <div>
                    <input name="user_name" type="text" required="required" value="<?= $_COOKIE['fullname'] ?>">
                    <span>Name</span>
                </div>
                <div>
                    <input name="user_phone" type="text" required="required" value="<?= $user_info['phone'] ?>">
                    <span>Phone</span>
                </div>
                <div>
                    <input name="user_mail" type="text" required="required" value="<?= $account['mail'] ?>">
                    <span>Email</span>
                </div>
                <div>
                    <input name="user_address" type="text" required="required" value="<?= $user_info['address'] ?>">
                    <span>Address</span>
                </div>
                <div>
                    <input name="user_passwd" type="password" required="required" value="<?= $account['passwd'] ?>">
                    <span>Password</span>
                </div>
            </div>
            <div class="update_message">
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    //unset($_SESSION['message']);
                }
                ?>
            </div>
            <div class="b-button">
                <div>
                    <button type="submit">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>