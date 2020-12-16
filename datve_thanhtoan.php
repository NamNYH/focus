<!DOCTYPE html>
<html>
<head>
<title> Trang đặt vé</title>
  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

input[type=sub] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=sub]:hover {
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


* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

}
</style>
</head>
<body>


     <div class ="container">
     <center>
<h2>Thông tin khách hàng đặt vé</h2></center>


<form name="Test"  >
    <table class="table table-bordered table-hover">
  
        <tr>
            <td> Mã vé</td>
            <td> Tên khách hàng</td>
            <td>Số điện thoại</td>
            <td> Email</td>
            <td> Địa chỉ</td>
            <td> Số lượng vé</td>
            <td> Giá vé</td>
            <td> Loại vé</td>
            <td> Số tiền phải thanh toán</td>
            <td> Hình thức thanh toán</td>
            <!-- <td> Trạng thái</td> -->
            <td>Hủy vé </td>
      
       
        </tr>
        <?php
     require 'libs/db_connect.php';
     $result = $con ->query("SELECT * FROM datve");
     while ($row = mysqli_fetch_assoc($result)):?>

       
          <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['sdt']; ?></td>
              <td><?php echo $row['email']; ?></td>  
              <td><?php echo $row['diachi']; ?></td>
              <td><?php echo $row['soluong']; ?></td>
              <td><?php echo $row['giave']; ?></td>  
              <td><?php echo $row['loaive']; ?></td>
              <td><?php echo $row['tongtien']; ?></td>
              <td><?php echo $row['hinhthuc']; ?></td>
              <!-- <td>?php echo $row['trangthai']; ?></td> -->
              <td><a href="datve_xoa.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;"></i></a></td>
          </tr>


       <?php endwhile; ?> 
               

    </table>

</form>
</body>
</html>
<a class="btn btn-info" href="http://localhost/dacn/index.php">Trở về trang chủ</a>
