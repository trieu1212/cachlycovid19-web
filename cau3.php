<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê công dân</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h2>Danh sách công dân</h2>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên công dân</th>
            <th>Giới tính</th>
            <th>Năm sinh</th>
            <th>Nước về</th>
            <th>Chức năng</th>
        </tr>
        <tbody id='dscongdan'>
            <?php
            include('connect.php');
            $i=1;
            $sql="select * from congdan";
            $result=$con->query($sql);
            while($row=$result->fetch_assoc()){
                echo "<tr id='row_".$row['MACONGDAN']."'>
                    <td>".$i++."</td>
                    <td>".$row['TENCONGDAN']."</td>";
                if($row['GIOITINH']==1){
                    echo "<td>Nam</td>";
                }
                else{
                    echo "<td>Nữ</td>";
                }
                echo "<td>".$row['NAMSINH']."</td>
                    <td>".$row['NUOCVE']."</td>
                    <td colspan=2>
                        <a href='cau4.php?MACONGDAN=".$row['MACONGDAN']."'>VIEW</a>
                        <button class='del' data-macongdan='".$row['MACONGDAN']."'>DELETE</button>
                      </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function(){
            $('.del').on('click',function(){
                $MACONGDAN = $(this).data('macongdan');
                deletecongdan($MACONGDAN)
            })
        });
        function deletecongdan(MACONGDAN){
            $.ajax({
                type: 'post',
                url: 'del.php',
                data: { MACONGDAN: MACONGDAN },
                success: function(data){
                    $('#dscongdan').html(data);
                }
            });
        }
    </script>
    
</body>
</html>