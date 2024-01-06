<?php
    include('connect.php');
    if(isset($_GET['MACONGDAN'])){
        $MACONGDAN=$_GET['MACONGDAN'];
        $sql ="select * from congdan join diemcachly on congdan.MADIEMCACHLY = diemcachly.MADIEMCACHLY where MACONGDAN='$MACONGDAN'";
        $result=$con->query($sql);
        while($row=$result->fetch_assoc()){
            echo "<form method='post'>
                <label>Mã công dân</label>
                <input type='text' name='MACONGDAN' placeholder='Mã công dân' value='".$row['MACONGDAN']."' readonly><br>
                 <label>Tên công dân</label>
                 <input type='text' name='TENCONGDAN' placeholder='Tên công dân' value='".$row['TENCONGDAN']."'><br>
                 <label >Giới tính</label>";
            $checked =($row['GIOITINH']==1)? 'checked':'';
            echo "<input type='checkbox' name='GIOITINH' $checked>          
                 <cite>Chọn tương ứng giới tính là 'Nam'</cite><br>
                 <label>Năm sinh</label>
                 <input type='date' name='NAMSINH' value='".$row['NAMSINH']."' ><br>
                 <label>Nước về</label>
                 <input type='text' name='NUOCVE' placeholder='Nước về' value='".$row['NUOCVE']."'><br>
                 <label >Điểm cách ly</label>
                 <select name ='MADIEMCACHLY'>";
            $sql1 = "select MADIEMCACHLY,TENDIEMCACHLY from diemcachly ";
            $result1=$con->query($sql1);
            while($row1=$result1->fetch_assoc()){
                $selected = ($row1['MADIEMCACHLY'] == $row['MADIEMCACHLY']) ? 'selected' : '';
                echo "<option value='".$row1['MADIEMCACHLY']."' $selected>".$row1['TENDIEMCACHLY']."</option>";
            }               
            echo "</select><br>
                <input type='submit' name='submit' value='Update'>
                </form><br>
                <a href='cau3.php'>Quay lại</a>";
        }
    }

    if(isset($_POST['submit']) && $_POST['submit']=='Update'){
            $MACONGDAN=$_POST['MACONGDAN'];
            $TENCONGDAN=$_POST['TENCONGDAN'];
            $GIOITINH = isset($_POST['GIOITINH']) ? 1 : 0;
            $NAMSINH=$_POST['NAMSINH'];
            $NUOCVE=$_POST['NUOCVE'];
            $MADIEMCACHLY=$_POST['MADIEMCACHLY'];
            $sql2 = "update congdan set TENCONGDAN='$TENCONGDAN',GIOITINH='$GIOITINH',NAMSINH='$NAMSINH',NUOCVE='$NUOCVE',MADIEMCACHLY='$MADIEMCACHLY' where MACONGDAN='$MACONGDAN'";
            $result2=$con->query($sql2);
    }
?>