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
                    'genreID' => $row['genreID'],
                    'gdiscount' => $row['gdiscount'],
                    'gprice' => $row['gprice'],
                    'gimg' => $row['gimg'],
                    'gquantity' => $row['gquantity'],
                    'cfg_os' => $row['cfg_os'],
                    'cfg_processor' => $row['cfg_processor'],
                    'cfg_graphics' => $row['cfg_graphics'],
                    'cfg_storage' => $row['cfg_storage'],
                    'about' => $row['about'],
                    'scr1' => $row['screenshot1'],
                    'scr2' => $row['screenshot2'],
                    'scr3' => $row['screenshot3'],
                    'scr4' => $row['screenshot4'],
                    'trailer' => $row['trailer']
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
                            $sql1 = 'SELECT *
                                FROM genres
                                WHERE genStatus=1
                                ORDER BY genID ASC';
                            $select = "";
                            $result1 = $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                while ($row = $result1->fetch_assoc()) {
                                    if ($row['genID']==$game['genreID']) {
                                        $select .= "<option value='" . $row['genID'] . "' selected>" . $row['genName'] . "</option>&nbsp;&nbsp;";
                                        continue;
                                    }
                                    $select .= "<option value='" . $row['genID'] . "'>" . $row['genName'] . "</option>&nbsp;&nbsp;";
                                }
                            }
                            echo $select;
                            $conn->close();
                            ?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class='modal-input' <?= !empty($game) ? "style='display:flex'" : "style='display:none'" ?>>
                    <div>
                        <label>Quantity :</label>
                    </div>
                    <div>
                        <input type='number' name='gquantity' min='0' <?= !empty($game) ? 'readonly' : '' ?> value='<?= !empty($game) ? $game['gquantity'] : '0'; ?>' required>
                    </div>
                </div>
                <hr <?= !empty($game) ? "style='display:block'" : "style='display:none'" ?>>
                <div class='modal-input'>
                    <div>
                        <label>Discount :</label>
                    </div>
                    <div>
                        <input type='number' name='gdiscount' min='0' max="100" value='<?= !empty($game) ? $game['gdiscount'] : ''; ?>' required>&nbsp;&nbsp;<span>%</span>
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
                        <input type='text' name='cfg_os' value='<?= !empty($game) ? $game['cfg_os'] : ''; ?>' required>
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
            <div class="image">
                <span>Image / Trailer</span>  
                <div class="image-div">
                    <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                        <img src='../../assets/img/<?= !empty($game) ? $game['gimg'] : ''; ?>'>
                    </div>
                    <div class='modal-input'>
                        <div>
                            <label>Avartar :</label>
                        </div>
                        <div>
                            <input type='file' name="gimg">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="image-div">
                    <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                        <img src='<?= !empty($game) ? $game['scr1'] : ''; ?>'>
                    </div>
                    <div class='modal-input'>
                        <div>
                            <label>Screenshot 1 :</label>
                        </div>
                        <div>
                            <input type='url' name="gscr1" placeholder="URL" value="<?= !empty($game) ? $game['scr1'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="image-div">
                    <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                        <img src='<?= !empty($game) ? $game['scr2'] : ''; ?>'>
                    </div>
                    <div class='modal-input'>
                        <div>
                            <label>Screenshot 2 :</label>
                        </div>
                        <div>
                            <input type='url' name="gscr2" placeholder="URL" value="<?= !empty($game) ? $game['scr2'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="image-div">
                    <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                        <img src='<?= !empty($game) ? $game['scr3'] : ''; ?>'>
                    </div>
                    <div class='modal-input'>
                        <div>
                            <label>Screenshot 3 :</label>
                        </div>
                        <div>
                            <input type='url' name="gscr3" placeholder="URL" value="<?= !empty($game) ? $game['scr3'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="image-div">
                    <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                        <img src='<?= !empty($game) ? $game['scr4'] : ''; ?>'>
                    </div>
                    <div class='modal-input'>
                        <div>
                            <label>Screenshot 4 :</label>
                        </div>
                        <div>
                            <input type='url' name="gscr4" placeholder="URL" value="<?= !empty($game) ? $game['scr4'] : ''; ?>">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="image-div">
                    <div class='game-image' style="display:<?= !empty($game) ? 'block' : 'none' ?>;">
                    <center>
                        <video width="450" height="250" controls>
                            <source src='<?= !empty($game) ? $game['trailer'] : ''; ?>' type="video/mp4">
                            <source src="../../assets/video/I Am Atomic 4k.mp4" type="video/mp4">
                        </video>
                    </center>
                    </div>
                    <div class='modal-input'>
                        <div>
                            <label>Trailer :</label>
                        </div>
                        <div>
                            <input type="url" name="gtrailer" placeholder="URL" value="<?= !empty($game) ? $game['trailer'] : ''; ?>">
                        </div>
                    </div>
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