<?php
include '../admin/head1.php';
include '../admin/leftmenu.php';
include '../../model/connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $game = array();
    $sql = "SELECT *
        FROM games join game_detail on games.gid = game_detail.gdt_id
        WHERE gid = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $game = array(
                'gid' => $row['gid'],
                'gname' => $row['gname'],
                'gcategory' => $row['gcategory'],
                'gdiscount' => $row['gdiscount'],
                'gprice' => $row['gprice'],
                'gquantity' => $row['gquantity'],
                'cfg_os' => $row['cfg_os'],
                'cfg_processor' => $row['cfg_processor'],
                'cfg_graphics' => $row['cfg_graphics'],
                'cfg_storage' => $row['cfg_storage'],
                'about' => $row['about']
            );
        }
    }
} else {
    $game = array();
}
?>

<div class='editgame-modalbox'>
    <div class='modal-header'>
        <h2><?= !empty($_GET['id']) ? "Edit Game" : "Add Game" ?></h2>
    </div>
    <div class='modal-body'>
        <form action='<?= !empty($game) ? "../../model/edit_Game.php?gid=$id" : "../../model/add_Game.php" ?>' method="post">
            <div class='general'>
                <span>General</span>
                <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                    <img src='../../assets/img/genshinSlideShow.jpg'>
                </div>
                <div class='modal-input'>
                    <div>
                        <label>Image :</label>
                    </div>
                    <div>
                        <input type='file'>
                    </div>
                </div>
                <hr>
                <div class='modal-input' style="display:<?= !empty($game) ? 'flex' : 'none' ?>;">
                    <div>
                        <label>ID :</label>
                    </div>
                    <div>
                        <input type='text' name='gid' disabled value='<?= !empty($game) ? $game['gid'] : ''; ?>'>
                    </div>
                </div>
                <hr style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                <div class='modal-input'>
                    <div>
                        <label>Name :</label>
                    </div>
                    <div>
                        <input type='text' name='gname' value='<?= !empty($game) ? $game['gname'] : ''; ?>' required>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Genres :</label>
                    </div>
                    <div>
                        <select name='gcategory'>
                            <?=
                            $sql1 = 'SELECT genre
                                FROM genres
                                ORDER BY genre ASC';
                            $select = "";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                                    $select .= "<option value='" . $row['genre'] . "'>" . $row['genre'] . "</option>&nbsp;&nbsp;";
                                    if (strcmp($row['genre'], $game['gcategory']) == 0) {
                                        $select .= "<option value='" . $row['genre'] . "' selected>" . $row['genre'] . "</option>&nbsp;&nbsp;";
                                    }
                                }
                            }
                            echo $select;
                            $conn->close();
                            ?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Quantity :</label>
                    </div>
                    <div>
                        <input type='number' name='gquantity' min='0' <?= !empty($game) ? 'readonly' : '' ?> value='<?= !empty($game) ? $game['gquantity'] : ''; ?>' required>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Discount :</label>
                    </div>
                    <div>
                        <input type='number' name='gdiscount' min='0' value='<?= !empty($game) ? $game['gdiscount'] : ''; ?>' required>&nbsp;&nbsp;<span>%</span>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Price :</label>
                    </div>
                    <div>
                        <input type='number' name='gprice' step="0.01" min='0' value='<?= !empty($game) ? $game['gprice'] : ''; ?>' required>&nbsp;&nbsp;<span>$</span>
                    </div>
                </div>
            </div>
            <div class='detail'>
                <span>Detail</span>
                <div class='modal-input'>
                    <div>
                        <label>OS :</label>
                    </div>
                    <div>
                        <input type='text' name='cfg_os' value='<?= !empty($game) ? $game['cfg_os'] : '';; ?>' required>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Processor :</label>
                    </div>
                    <div>
                        <input type='text' name='cfg_processor' value='<?= !empty($game) ? $game['cfg_processor'] : ''; ?>' required>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Graphics :</label>
                    </div>
                    <div>
                        <input type='text' name='cfg_graphics' value='<?= !empty($game) ? $game['cfg_graphics'] : ''; ?>' required>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <div>
                        <label>Storage :</label>
                    </div>
                    <div>
                        <input type='text' name='cfg_storage' value='<?= !empty($game) ? $game['cfg_storage'] : ''; ?>' required>
                    </div>
                </div>
                <hr>
                <div class='modal-input'>
                    <textarea name='about' placeholder="About" required><?= !empty($game) ? $game['about'] : ''; ?></textarea>
                </div>
            </div>
            <div class='form-submit'>
                <div>
                    <button type="submit"><?= !empty($game) ? "Update" : "Add" ?></button>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="../../assets/js/leftmenu.js"></script>