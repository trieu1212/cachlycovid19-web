<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm công dân</title>
</head>
<body>
<form method="post">
        <label for="">Mã công dân</label>
        <input type="text" name='MACONGDAN' placeholder="Mã công dân"><br>
        <label for="">Tên công dân</label>
        <input type="text" name='TENCONGDAN' placeholder="Tên công dân"><br>
        <label for="">Giới tính</label>
        <input type="checkbox" name='GIOITINH'>
        <cite>Chọn tương ứng giới tính là 'Nam'</cite><br>
        <label for="">Năm sinh</label>
        <input type="date" name='NAMSINH' ><br>
        <label for="">Nước về</label>
        <input type="text" name='NUOCVE' placeholder="Nước về"><br>
        <label for="">Điểm cách ly</label>
        <select name="MADIEMCACHLY">
            <?php
                include('connect.php');
                $sql ="select MADIEMCACHLY,TENDIEMCACHLY from diemcachly";
                $result=$con->query($sql);
                while($row=$result->fetch_assoc()){
                    echo "<option value='".$row['MADIEMCACHLY']."'>".$row['TENDIEMCACHLY']."</option>";
                }
            ?>
        </select>
        <br><input type="submit"name='submit'value='Thêm'>
    </form>
    <br>
    <?php
        include('connect.php');
        if(isset($_POST['submit']) && $_POST['submit']=='Thêm'){
            $MACONGDAN=$_POST['MACONGDAN'];
            $TENCONGDAN=$_POST['TENCONGDAN'];
            $GIOITINH=isset($_POST['GIOITINH'])? 1:0;
            $NAMSINH=$_POST['NAMSINH'];
            $NUOCVE=$_POST['NUOCVE'];
            $MADIEMCACHLY=$_POST['MADIEMCACHLY'];
            $sql = "insert into congdan (MACONGDAN,TENCONGDAN,GIOITINH,NAMSINH,NUOCVE,MADIEMCACHLY) values('$MACONGDAN','$TENCONGDAN','$GIOITINH','$NAMSINH','$NUOCVE','$MADIEMCACHLY')";
            $result=$con->query($sql);
        }
    ?>
</body>
</html>