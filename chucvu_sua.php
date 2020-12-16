<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
input[type=button] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>

<?php
// Kết nối Database
  include_once ('libs/db_connect.php');
  
  $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * FROM chucvu where id='$id'");
  $row=mysqli_fetch_assoc($query);
  
?>
<div class="container">



    <div id="BuyTicket" class="tabcontent">
     <div id="clock"></div>
            <h2 style="text-align:center;">SỬA THÔNG TIN CHỨC VỤ</h2>
            <div class="buy_ticket">
      <form method="post" class="form">
      
        <label>Chức vụ: <input type="text" value="<?php echo $row['name']; ?>" name="Name" ></label><br/>
        <label>Mô tả: <input type="text" value="<?php echo $row['mota']; ?>" name="Mota" ></label><br/>
        
        <input type="submit" value="Cập nhật" name="update_user" />
  
      
      <?php

          if (isset($_POST['update_user'])){
          $id=$_GET['id'];
          $name=$_POST['Name'];
          $mota=$_POST['Mota'];
        
          include_once ('libs/db_connect.php');                                 
        
       
          $sql = "UPDATE chucvu SET name='$name', mota='$mota' WHERE id='$id'";
          
          if ($con->query($sql) === TRUE) {
            echo "<script>
            alert('Sửa thành công !');</script>";
            header('Location: http://localhost/mot/chucvu.php');
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
