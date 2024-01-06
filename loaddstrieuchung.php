<?php
    include('connect.php');
    $MACONGDAN=$_POST['MACONGDAN'];
    $i=1;
    $sql="select trieuchung.MATRIEUCHUNG,trieuchung.TENTRIEUCHUNG from trieuchung join cn_tc on cn_tc.MATRIEUCHUNG = trieuchung.MATRIEUCHUNG where cn_tc.MACONGDAN ='$MACONGDAN'";
    $result = $con->query($sql);
    echo "<table border = '1'
     <tr>
     <th>STT</th>
     <th>Mã triệu chứng</th>
     <th>Tên triệu chứng</th>
     </tr>";
    while($row=$result->fetch_assoc()){
        echo "<tr>
            <td>".$i++."</td>
            <td>".$row['MATRIEUCHUNG']."</td>
            <td>".$row['TENTRIEUCHUNG']."</td>
            </tr>";
    }
    echo "</table>";
?>