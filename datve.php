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


<?php require_once ("libs/db_connect.php"); ?>
<?php
require_once ("libs/db_connect.php");

if (isset($_POST['capnhat'])) {
  $name = $_POST['name'];
  $diachi = $_POST['diachi'];
  $sdt = $_POST['phone'];
  $email = $_POST['email'];
  $soluong =$_POST['soluong'];
  $giave =$_POST['ve']; 
  $loaive =$_POST['loaive']; 
  $tongtien	= $_POST['tongtien'];
  $hinhthuc = $_POST['hinhthuc'];
  $trangthai = $_POST['Trangthai'];

 
  
  if($con -> query("INSERT INTO `datve`( `name`,`diachi`, `sdt`, `email`, `soluong`, `giave`,`loaive`, `tongtien`,`hinhthuc`, `trangthai`)
        VALUES ('$name', '$diachi','$sdt','$email','$soluong','$giave','$loaive','$tongtien','$hinhthuc','$trangthai')")){
          echo "<script>
          alert('Thêm thành công !');required</script>";
                    header('Location: http://localhost/dacn/datve_thanhtoan.php');

        }else {
          echo "<script>
          alert('Thêm thất bại !');</script>";
        }
      }
     
      $con->close();
    



?>
<h1>EBUS BOOKING</h1>
<center>
<h2>Đặt vé xe BUS</h2></center>

<div class="container">
<form action="" method="POST">
          <div class="col-50">
           <h3>Khách hàng vui lòng nhập thông tin cá nhân</h3>
           <label for="cname">Tên khách hàng </label>
            <input type="text" id="cname" name="name" placeholder="Khách hàng vui lòng nhập tên..."required>
          <div class="row">
          <div class="col-50">
                <label for="cvv">Địa chỉ</label>
                <input type="text" id="cvv" name="diachi" placeholder="Vui lòng cho biết địa chỉ"required>
              </div>
       
              <div class="col-25">
                <label for="expyear">Số điện thoại</label>
                <input type="text" id="expyear" name="phone" placeholder="Số điện thoại"required>
              </div>          
              </div>
              <div class="col-̀50">
                <label for="cvv">Email người dùng</label>
                <input type="text" id="cvv" name="email" placeholder="Vui lòng cho biết Email"required>
              </div>
          
           
            <div class="row">
       <div class="col-25">
         <label for="expyear">Số lượng vé</label>
         <input type="text" id="sl" name="soluong"min="1" value="1" type="number" placeholder="Vui lòng nhập số lượng vé"required>
       </div>
       <div class="col-25">
         <label for="cvv">Giá vé</label>
         <input type="text" id="gv" name="ve" value="5000" placeholder="Gía vé">
       </div>
       <div class="col-25">
      <label for="cvv">Loại vé</label>
                <select name="loaive"  type="text" id="lv" required >
                <optgroup label="Loại vé ">
                <option value="Vé ngày">Vé ngày</option>
                <option value="Vé tháng">Vé tháng</option>
                </optgroup>
         
                          <!-- ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['name'];?></option>
                            ?php endwhile; ?> -->
                            </select>
           
                </div> 
       <div class="col-25">
         <label for="cvv">Thành tiền</label>
         <input type="text" id="tdt"  name="tongtien" placeholder="Tổng số tiền phải trả là...">
       </div>
       <div class="col-25">
       <label for="cvv">Chọn hình thức thanh toán</label>
                <select name="hinhthuc"  type="text" id="tt" required >
                <optgroup label="Hình thức thanh toán ">
                <option value="Thanh toán trực tiếp">Thanh toán trực tiếp</option>
                <option value="Thanh toán online">Thanh toán online</option>
                </optgroup>
         
                          <!-- ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['name'];?></option>
                            ?php endwhile; ?> -->
                            </select>
           
                </div> 
       <div class="col-25">
       <label for="cvv">Trạng thái</label>
                <select name="Trangthai"  type="text" id="tt" required >
                <optgroup label="Trạng thái ">
                <option value="Chưa thanh toán">Chưa thanh toán</option>
                <option value=" Đã thanh toán">Đã thanh toán</option>
                </optgroup>
         
                          <!-- ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['name'];?></option>
                            ?php endwhile; ?> -->
                            </select>
           
                </div> 
   
       <input type="submit" value="Đặt vé"name="capnhat"class="btn"required>
        </div>
       
        </div>
      </form>


    </div>
 
     

    </table>

</form>
</body>
</html>
<a class="btn btn-red" href="http://localhost/dacn/index.php">Trở về trang chủ</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>
  $( "#sl" ).keyup(function() {
    let soluong = $(this).val();
    let gia = $('#gv').val();
    console.log({ soluong, gia });
    $('#tdt').val(Number(soluong) * Number(gia));
  });
  
</script>
