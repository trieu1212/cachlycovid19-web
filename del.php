<?php
    include('connect.php');
    if(isset($_POST['MACONGDAN'])){
        $MACONGDAN=$_POST['MACONGDAN'];
        $sql="delete from congdan where MACONGDAN = '$MACONGDAN'";
        $result = $con->query($sql);
    }
?>