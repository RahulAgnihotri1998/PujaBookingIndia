<?php
function getUsers(){
    global $db;
    $sql = "SELECT * FROM user ORDER BY ID DESC";
    $result = mysqli_query($db, $sql);
    if($result){
        $getUser = array();
        while($row = mysqli_fetch_assoc($result)){
            $getUser[] = $row;
        }
        return $getUser;
    }
}
?>