<?php
    include './connect.php';
    if(isset($_GET['search']) && isset($_GET['groupID']) && isset($_GET['pagenum'])) {
        $html="";
        $sql="";
        $sql1="";
        $count = 0;
        $pagenum = intval($_GET['pagenum']);
        $pos = intval(($pagenum - 1) * 10);
        $search = $_GET['search'];
        $groupid = intval($_GET['groupID']);    
        if($groupid == 0) {
            $sql = "SELECT accid,account.userID,fullname,mail,phone,groupName,acc_status
                    FROM account JOIN auth_group ON account.groupID = auth_group.groupID JOIN users on account.userID = users.userID 
                    WHERE fullname REGEXP '$search' or mail REGEXP '$search' or phone REGEXP '$search'
                    ORDER BY accid ASC
                    LIMIT $pos,10";
            $sql1 = "SELECT accid,account.userID,fullname,mail,phone,groupName,acc_status
                    FROM account JOIN auth_group ON account.groupID = auth_group.groupID JOIN users on account.userID = users.userID 
                    WHERE fullname REGEXP '$search' or mail REGEXP '$search' or phone REGEXP '$search'
                    ORDER BY accid ASC";
        }
        else {
            $sql = "SELECT accid,account.userID,fullname,mail,phone,account.groupID,groupName,acc_status
                    FROM account JOIN auth_group ON account.groupID = auth_group.groupID JOIN users on account.userID = users.userID 
                    WHERE account.groupID = $groupid AND (fullname REGEXP '$search' or mail REGEXP '$search' or phone REGEXP '$search') 
                    ORDER BY accid ASC
                    LIMIT $pos,10";
            $sql1 = "SELECT accid,account.userID,fullname,mail,phone,account.groupID,groupName,acc_status
                    FROM account JOIN auth_group ON account.groupID = auth_group.groupID JOIN users on account.userID = users.userID 
                    WHERE account.groupID = $groupid AND (fullname REGEXP '$search' or mail REGEXP '$search' or phone REGEXP '$search') 
                    ORDER BY accid ASC";
        }
        $result = $conn->query($sql);
        $result1 = $conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row['acc_status'] == 1)
                    $status ="On";
                else 
                    $status ="Lock";
               $html.=
                    "<tr>
                        <td>".$row['accid']."</td>
                        <td>".$row['userID']."</td>
                        <td>".$row['fullname']."</td>
                        <td>".$row['mail']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['groupName']."</td>
                        <td>".$status."</td>
                        <td>
                            <a href='./editaccount.php?page=listaccount&accid=".$row['accid']."'><button>Edit</button></a>            
                            <a href=''><button onclick='deleteaccount(".$row['userID'].")'>Delete</button></a>
                        </td>
                    </tr>"
                ;
            }
        }
    
        if ($result1->num_rows > 0) {
            while ($row = $result1->fetch_assoc()) {
                $count++;
            }
        }
        $count /= 10;
        $myobj = new stdClass();
        $myobj->pagenum = ceil($count);
        $myobj->html = $html;
        $myJSON = json_encode($myobj);
        echo $myJSON;
    }
    $conn->close();
?>