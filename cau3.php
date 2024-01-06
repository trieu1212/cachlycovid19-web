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
        </tbody>
    </table>
    <script>
        $(document).ready(function(){
            loadcongdan();
        })
        $(document).on('click','.del',function(){
            var MACONGDAN = $(this).data('macongdan');
            deletecongdan(MACONGDAN)
        })
        function loadcongdan(){
            $.ajax({
                type: 'post',
                url: 'loadcongdan.php',
                success:function(data){
                    $('#dscongdan').html(data);
                }
            })
        }
        function deletecongdan(MACONGDAN){
            $.ajax({
                type: 'post',
                url: 'del.php',
                data: { MACONGDAN: MACONGDAN },
                success: function(data){
                    loadcongdan();
                }
            });
        }
    </script>
    
</body>
</html>