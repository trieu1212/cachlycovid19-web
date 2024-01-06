<?php
    include('connect.php');
    $MADIEMCACHLY = $_POST['MADIEMCACHLY'];
    $sql="select MACONGDAN,TENCONGDAN from congdan where MADIEMCACHLY = '$MADIEMCACHLY'";
    $result = $con->query($sql);
    while($row=$result->fetch_assoc()){
        echo "<option value='".$row['MACONGDAN']."'>".$row['TENCONGDAN']."</option>";
    }
?>