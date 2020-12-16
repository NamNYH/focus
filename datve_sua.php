<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/*-...........................................Mua vé ....................................................-*/
.nam {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
#Thanhtoan,#Thanhtien {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#Thanhtoan:hover {
  background-color: #45a049;
}

.buy_ticket {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
/* tiêu đề bảng */
.ex {
  background-color: #7FFFD4;
}
</style>
</head>

<?php
// Kết nối Database
  include_once ('libs/db_connect.php');
  
  $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * FROM datve where id='$id'");
  $row=mysqli_fetch_assoc($query);
  
?>
<div class="container">


<!--  Mua Vé -->
    <div id="BuyTicket" class="tabcontent">
     <div id="clock"></div>
            <h2 style="text-align:center;">SỬA THÔNG TIN KHÁCH HÀNG</h2>
            <div class="buy_ticket">
      <form method="post" class="form">
      
        <label>Họ Tên: <input type="text" value="<?php echo $row['name']; ?>" name="name" class="nam"></label><br/>
        <label>Email: <input type="text" value="<?php echo $row['email']; ?>" name="email" class="nam"></label><br/>
        <label>Số điện thoại: <input type="text" value="<?php echo $row['sdt']; ?>" name="sdt" class="nam"></label><br/>
        <label>Số lượng: <input id="soluong" type="text" value="<?php echo $row['soluong']; ?>" name="Soluong"class="nam"></label><br/>
        <label>Giá vé: <input  id="giave"type="text" value="<?php echo $row['giave']; ?>" name="Giave"class="nam"></label><br/>
        <label>Loại vé: <input type="text" value="<?php echo $row['loaive']; ?>" name="Loaive"class="nam"></label><br/>
        <label>Tổng tiền: <input type="text"id="tien"  value="<?php echo $row['tongtien']; ?>" name="tongve"class="nam"></label><br/>
        <input type="submit" id ="Thanhtoan"value="Cập nhật" name="update_user" />
  
      
      <?php

          if (isset($_POST['update_user'])){
          $id=$_GET['id'];
          $name=$_POST['name'];
          $email=$_POST['email'];
          $sdt=$_POST['sdt'];
          $soluong=$_POST['Soluong'];
          $giave=$_POST['Giave'];
          $loaive=$_POST['Loaive'];
          $tongtien = $_POST['tongve'];
          include_once ('libs/db_connect.php');                                 
        
       
          $sql = "UPDATE datve SET name='$name', email='$email', sdt='$sdt', soluong='$soluong', giave='$giave', loaive='$loaive',tongtien='$tongtien' WHERE id='$id'";
          
          if ($con->query($sql) === TRUE) {
            echo "<script>
            alert('Sửa thành công !');</script>";
            header('Location: http://localhost/mot/datve_view.php');
          }else {
            echo "<script>
            alert('Sửa vé thất bại !');</script>";
          }
          
          $con->close();
          }
      ?>
      </form>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>
  $( "#soluong" ).keyup(function() {
    let soluong = $(this).val();
    let gia = $('#giave').val();
    console.log({ soluong, gia });
    $('#tien').val(Number(soluong) * Number(gia));
  });
  
</script>
