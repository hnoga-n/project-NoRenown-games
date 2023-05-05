<?php
include '../admin/head1.php';
include '../admin/leftmenu.php';
include '../../model/connect.php';
if (isset($_GET['suppID'])) {
    $suppid = $_GET['suppID'];
    $supp = array();
    $sql = "SELECT suppID,suppName,suppMail,suppTel
                FROM supplier
                WHERE suppID = $suppid";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supp = array(
                'suppID' => $row['suppID'],
                'suppName' => $row['suppName'],
                'suppMail' => $row['suppMail'],
                'suppTel' => $row['suppTel'],
            );
        }
    }
} else {
    $supp = array();
}

?>
<div class="editsupp-modalbox">
    <div class='modal-header'>
        <h2><?= !empty($_GET['suppID']) ? 'Edit Supplier' : 'Add Supplier' ?></h2>
    </div>
    <div class="modal-form">

        <form action="<?= !empty($supp) ? "../../model/edit_supplier.php?suppID=" . $supp['suppID'] : "../../model/add_supplier.php" ?>" onsubmit="return checkaddsupp(<?= !empty($supp) ? 1 : 0 ?>)" method="post">
            <div class="form-div" <?= !empty($supp) ? '' : 'style="display:none;"' ?>>
                <div>
                    <span>Supplier ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?= !empty($supp) ? $supp['suppID'] : '' ?>">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Supplier Name:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($supp) ? $supp['suppName'] : '' ?>" name="suppName" required>
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Supplier Mail:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($supp) ? $supp['suppMail'] : '' ?>" name="suppMail" required>
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Supplier Telephone:</span>
                </div>
                <div>
                    <input type="text" value="<?= !empty($supp) ? $supp['suppTel'] : '' ?>" name="suppTel" required>
                </div>
            </div>
            <div class="form-button">
                <div>
                    <button type="submit"><?= !empty($_GET['suppID']) ? 'Update' : 'Add' ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="../../assets/js/leftmenu.js"></script>
<script src="../../assets/js/checkaddsupplyt.js"></script>