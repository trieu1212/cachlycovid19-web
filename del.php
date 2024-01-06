<?php
    include('connect.php');
    if(isset($_POST['MACONGDAN'])){
        $MACONGDAN=$_POST['MACONGDAN'];
        $sql="delete from congdan where MACONGDAN = '$MACONGDAN'";
        $result = $con->query($sql);
        $sql1="select * from congdan";
        $result1= $con->query($sql1);
        while($row=$result1->fetch_assoc()){
            echo "<tr id='row_".$row['MACONGDAN']."'>";
                echo "<td>".$i++."</td>";
                echo "<td>".$row['TENCONGDAN']."</td>";
                if($row['GIOITINH']==1){
                    echo "<td>Nam</td>";
                }
                else{
                    echo "<td>Nữ</td>";
                }
                echo "<td>".$row['NAMSINH']."</td>";
                echo "<td>".$row['NUOCVE']."</td>";
                echo "<td colspan=2>
                        <a href='viewcongdan.php?MACONGDAN=".$row['MACONGDAN']."'>VIEW</a>
                        <button class='del' data-macongdan='".$row['MACONGDAN']."'>DELETE</button>
                      </td>";
                echo "</tr>";
        }
    }
?>