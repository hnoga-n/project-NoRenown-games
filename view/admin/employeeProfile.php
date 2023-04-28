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
                    <span>Employee since: <?= $account['date_create'] ?></span>
                </div>
            </div>

        </div>
    </div>
    <div class="bottom">
        <form class="bottom-div" name="update_profile_employee" onsubmit="return sanitizeUpdateEmployeeProfileForm()" action="../../model/updateProfile.php?query=updateemployee" method="POST">
            <div class="b-title">
                <span>Profile</span>
            </div>
            <div class="b-input">
                <div>
                    <input name="user_name" type="text" required="required" value="<?= $_COOKIE['fullname'] ?>">
                    <span>Name</span>
                    <div style="display:none;" class="input_message" id="name_update_message"></div>
                </div>
                <div>
                    <input name="user_phone" type="text" required="required" value="<?= $user_info['phone'] ?>">
                    <span>Phone</span>
                    <div style="display:none;" class="input_message" id="phone_update_message"></div>
                </div>
                <div>
                    <input name="user_address" type="text" required="required" value="<?= $user_info['address'] ?>">
                    <span>Address</span>
                </div>
                <div>
                    <input name="user_passwd" type="password" required="required" id="password" value="<?= $account['passwd'] ?>">
                    <i class="fa-solid fa-eye-slash" id="togglePassword"></i>
                    <span>Password</span>
                    <div style="display:none;" class="input_message" id="pw_update_message"></div>

                </div>
                <div>
                    <input name="user_mail" type="text" required="required" value="<?= $account['mail'] ?>" readonly disabled>
                    <span id="useremail">Email</span>
                </div>
            </div>
            <div class="update_message">
                <div class="mess">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
            </div>
            <div class="b-button">
                <div>
                    <button type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("fa-eye");
    });
</script>