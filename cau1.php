<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm điểm cách ly</title>
</head>
<body>
    <form method="post">
        <label for="">Mã điểm cách ly</label>
        <input type="text" name='MADIEMCACHLY' placeholder="Mã điểm cách ly"><br>
        <label for="">Tên điểm cách ly</label>
        <input type="text" name='TENDIEMCACHLY' placeholder="Tên điểm cách ly"><br>
        <label for="">Địa chỉ</label>
        <input type="text" name='DIACHI' placeholder="Địa chỉ"><br>
        <label for="">Sức chứa</label>
        <input type="text" name='SUCCHUA' placeholder="Sức chứa"><br>
        <br><input type="submit"name='submit'value='Thêm'>
    </form>
    <br>
    <?php
    include('connect.php');
    if(isset($_POST['submit']) && $_POST['submit']=='Thêm'){
        $MADIEMCACHLY=$_POST['MADIEMCACHLY'];
        $TENDIEMCACHLY=$_POST['TENDIEMCACHLY'];
        $DIACHI=$_POST['DIACHI'];
        $SUCCHUA=$_POST['SUCCHUA'];
        $sql= "insert into diemcachly (MADIEMCACHLY,TENDIEMCACHLY,DIACHI,SUCCHUA) values('$MADIEMCACHLY','$TENDIEMCACHLY','$DIACHI','$SUCCHUA')";
        $result = $con->query($sql);
    }
    ?>
</body>
</html>