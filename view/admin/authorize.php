<?php
session_start();
include 'leftmenu.php';
include 'head1.php'
?>
<div class="authorize-modalbox">
    <div class="back-to-import">
        <span>⬅Back</span>
    </div>
    <div class='modal-header'>
        <h2><?= !empty($_GET['grid']) ? 'Edit group' : 'Add group' ?></h2>
    </div>
    <div class="modal-form">
        <form id="myForm" onsubmit="return checkCheckBox()" action="../../model/auth_handle.php?query=submited" method="POST">
            <div class="form-general">
            </div>
            <div class="form-authorize">
                <div class="authorize-header"><span>Features:</span></div>
                <div class="authorize-content">
                </div>
            </div>
            <div class="update_message">
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </div>
            <div class="form-button">
                <div>
                    <button><?= !empty($_GET['grid']) ? 'Update' : 'Add' ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="../../assets/js/leftmenu.js"></script>
<script src="../../controller/authority.js"></script>
<script src="../../assets/js/checkFormAuth.js"></script>