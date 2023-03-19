<?php
include '../admin/head1.php';
include '../admin/leftmenu.php';
?>
<div class="editaccount-modalbox">
    <div class='modal-header'>
        <h2><?=!empty($_GET['accid'])?'Edit account':'Add account'?></h2>
    </div>
    <div class="modal-form">
        <form action="">
            <div class="form-div">
                <div>
                    <span>Account ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="1">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Account ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="1">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>User type:</span>
                </div>
                <div>
                    <input type="text" readonly value="customer">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Full name:</span>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Phone:</span>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Address:</span>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Mail:</span>
                </div>
                <div>
                    <input type="email">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Password:</span>
                </div>
                <div>
                    <input type="text">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Date create:</span>
                </div>
                <div>
                    <input type="text" readonly value="10/10/2020">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Status:</span>
                </div>
                <div>
                    <label class='switch'>
                        <input type='checkbox'>
                        <span class='slider round'></span>
                    </label>
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Group:</span>
                </div>
                <div>
                    <select name="" id="">
                        <option value="">Admin</option>
                        <option value="">Employee</option>
                        <option value="">Customer</option>
                    </select>
                </div>
            </div>
            <div class="form-button">
                <div>
                    <button type="button"><?=!empty($_GET['accid'])?'Update':'Add'?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="../../assets/js/leftmenu.js"></script>