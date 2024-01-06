<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê triệu chứng</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <h2>Liệt kê triệu chứng</h2>
    <label for="">Tên điểm cách ly</label>
    <select name="MADIEMCACHLY" id="MADIEMCACHLY">
        <?php
            include('connect.php');
            $sql ="select MADIEMCACHLY,TENDIEMCACHLY from diemcachly";
            $result = $con->query($sql);
            while($row=$result->fetch_assoc()){
                echo "<option value='".$row['MADIEMCACHLY']."'>".$row['TENDIEMCACHLY']."</option>";
            }
        ?>
    </select>
    <br>
    <label for="">Tên công dân</label>
    <select name="MACONGDAN" id="MACONGDAN"></select><br>
    <div id='dstrieuchung'></div><br>
    <script>
        $(document).ready(function(){
            $('#MADIEMCACHLY').on('change',function(){
                var MADIEMCACHLY=$('#MADIEMCACHLY').val();
                loadtencongdan(MADIEMCACHLY);
            })
            $('#MACONGDAN').on('change',function(){
                var MACONGDAN=$('#MACONGDAN').val();
                console.log(MACONGDAN);
                loaddstrieuchung(MACONGDAN);
            })
        })
        function loadtencongdan(MADIEMCACHLY){
            $.ajax({
                type:'post',
                url: 'loadtencongdan.php',
                data:{
                    MADIEMCACHLY:MADIEMCACHLY
                },
                success:function(data){
                    $('#MACONGDAN').html(data);
                }
            })
        }
        function loaddstrieuchung(MACONGDAN){
            $.ajax({
                type:'post',
                url:'loaddstrieuchung.php',
                data:{MACONGDAN:MACONGDAN},
                success:function(data){
                    $('#dstrieuchung').html(data);
                }
            })
        }
    </script>
</body>
</html>