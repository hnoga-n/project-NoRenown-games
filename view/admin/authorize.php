<?php
session_start();
include 'leftmenu.php';
include 'head1.php'
?>
<div class="authorize-modalbox">
    <div class='modal-header'>
        <h2><?= !empty($_GET['grid']) ? 'Edit group' : 'Add group' ?></h2>
    </div>
    <div class="modal-form">
        <form action="../../model/auth_handle.php?query=submited" method="POST">
            <div class="form-general">
                <!-- <div class="form-general-div">
                    <div>
                        <span>Group ID:</span>
                    </div>
                    <div>
                        <input id="groupID" type="text" value="1" readonly>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Group name:</span>
                    </div>
                    <div>
                        <input id="group-name" type="text" required>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Date created:</span>
                    </div>
                    <div>
                        <input id="group-date-create" type="text" readonly>
                    </div>
                </div>
                <div class="form-general-div">
                    <div>
                        <span>Date updated:</span>
                    </div>
                    <div>
                        <input id="group-date-create" type="text" readonly>
                    </div>
                </div> -->


            </div>
            <div class="form-authorize">
                <div class="authorize-header"><span>Features:</span></div>
                <div class="authorize-content">


                    <!-- <div class="authorize-card">
                        <header>Game</header>
                        <div class="authorize-card-div">
                            <div><label>Add game</label></div>
                            <div>
                                <label class='switch'>
                                    <input type='checkbox'>
                                    <span class='slider round'></span>
                                </label>
                            </div>
                        </div>
                        <div class="authorize-card-div">
                            <div><label>Edit game</label></div>
                            <div>
                                <label class='switch'>
                                    <input type='checkbox'>
                                    <span class='slider round'></span>
                                </label>
                            </div>
                        </div>
                        <div class="authorize-card-div">
                            <div><label>Delete game</label></div>
                            <div>
                                <label class='switch'>
                                    <input type='checkbox'>
                                    <span class='slider round'></span>
                                </label>
                            </div>
                        </div>
                    </div>
 -->

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