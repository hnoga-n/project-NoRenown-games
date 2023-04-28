<?php
    //include './connect.php';
    if(isset($_COOKIE['accountId'])) {
        $accid = $_COOKIE['accountId'];
        $features_arr = array();
        $sql = "SELECT auth_group_detail.feaID,action,visible
                FROM ((features JOIN auth_group_detail ON features.feaID=auth_group_detail.feaID) JOIN auth_group ON auth_group_detail.groupID = auth_group.groupID) JOIN account ON auth_group.groupID = account.groupID
                WHERE accid=$accid
                order by feaID asc";
        $result = $conn->query($sql);
        $GLOBALS['feaid'] = 1;
        $jsonFeature = '{';
        if($result->num_rows > 0) {
            while($row=$result->fetch_assoc()) {
                if($row['feaID'] != $feaid) {
                    $feaid = $row['feaID']; 
                    $jsonFeature = substr($jsonFeature,0,-1);
                    $jsonFeature.='}';
                    array_push($features_arr,$jsonFeature);
                    $jsonFeature = '{';
                }
                $jsonFeature.='"'.$row['action'].'"'.":".$row['visible'].",";
            }
            $jsonFeature = substr($jsonFeature,0,-1);
            $jsonFeature.='}';
            array_push($features_arr,$jsonFeature);
        } 
        //print_r($features_arr);
    } else {
        echo"<script>alert('ban chua dang nhap')</script>";
    }
?>