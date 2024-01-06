<?php
include('connect.php');
$i = 1;
$sql = "select * from congdan";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr id='row_" . $row['MACONGDAN'] . "'>
        <td>" . $i++ . "</td>
        <td>" . $row['TENCONGDAN'] . "</td>";
    if ($row['GIOITINH'] == 1) {
        echo "<td>Nam</td>";
    } else {
        echo "<td>Nữ</td>";
    }
    echo "<td>" . $row['NAMSINH'] . "</td>
        <td>" . $row['NUOCVE'] . "</td>
        <td colspan=2>
            <a href='cau4.php?MACONGDAN=" . $row['MACONGDAN'] . "'>VIEW</a>
            <button class='del' data-macongdan='" . $row['MACONGDAN'] . "'>DELETE</button>
        </td>
    </tr>";
}
