<?php

    include '../admin/head1.php';
    include '../admin/leftmenu.php';
    include '../../model/connect.php';
    $orderid = $_GET['orderID'];
    $sql = "SELECT orderID,accID,total_price,date_create,order_status,consignee_name,address,phone_number	
            FROM invoice 
            WHERE orderID = $orderid";

    $sql2 = "SELECT gid,quantity,price,discount,img,gname 
            FROM invoice_detail 
            WHERE orderID = $orderid";

    $result = $conn->query($sql);
    $result2 = $conn->query($sql2);
    
    $row = $result->fetch_assoc();
?>

<div class="editaccount-modalbox" style="width: calc(100% - 120px)">
    <div class='modal-header'>
        <h2>ORDER DETAIL</h2>
    </div>
    <div class="modal-form">
        <form>
            <div class="form-div">
                <div>
                    <span>Order ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['orderID'] ?>" name="fullname">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Account ID:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['accID'] ?>" name="fullname">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Consignee name:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['consignee_name'] ?>" name="fullname">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Phone:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['phone_number'] ?>" name="phone">
                </div>
            </div>

            <div class="form-div">
                <div>
                    <span>Address:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['address'] ?>" name="address">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Date order:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['date_create'] ?>">
                </div>
            </div>
            <div class="form-div">
                <div>
                    <span>Status:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php 
                        switch ($row['order_status']) {
                            case '0': 
                                echo 'Waiting';
                                break;   
                            case '1':
                                echo 'Processed';
                                break;
                            case '2':
                                echo 'Canceled';
                                break;    
                        }
                    ?>">
                </div>    
            </div>  
            <div class="form-div">
                <div>
                    <span>Total price:</span>
                </div>
                <div>
                    <input type="text" readonly value="<?php echo $row['total_price'] ?> $">
                </div>    
            </div>  
        </form>
    </div>
<div class="main" style="margin-left: 0;width: 100%">
    <div class="listgames">
        <table>
            <thead>
                <tr>
                <th style="width: 10%;">ID</th>
                <th style="width: 30%;">Name</th>
                <th style="width: 10%;">Price</th>
                <th style="width: 10%;">Quantity</th>
                <th style="width: 10%;">Discount</th>
                <th style="width: 30%;">Image</th>
                </tr>
            </thead>
            <tbody id="showlistaccount">
                <!-- Show list order details -->
                <?php while($row2 = $result2->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row2['gid'] ."</td>
                        <td>" . $row2['gname'] ."</td>
                        <td>" . $row2['price'] ."$</td>
                        <td>" . $row2['quantity'] ."</td>
                        <td>" . $row2['discount'] ."$</td>
                        <td>
                            <img src='../../assets/img/" . $row2['img'] ."'>
                        </td>
                    </tr>";
                } ?>    
            </tbody>
        </table>
    </div>  
</div>
</div>


<script src="../../assets/js/leftmenu.js"></script>
