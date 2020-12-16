<!DOCTYPE html>
<html>
<head>
<title> Quản lý doanh thu</title>
  
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

if (isset($_POST['a'])) {
 
  $name = $_POST['name'];
  $diachi = $_POST['diachi'];
  $email = $_POST['email'];
  $sdt = $_POST['phone'];
  $Soluong =$_POST['soluong'];
  $Giave =$_POST['ve'];
  $Tongdoanhthu= $_POST['tongdoanhthu'];
  $trangthai = $_POST['trangthai'];
  
  if($con -> query("INSERT INTO doanhthu(name,diachi,email,sdt,Soluong,Giave,Tongdoanhthu,trangthai)
        VALUES ('$name', '$diachi','$email','$sdt','$Soluong','$Giave','$Tongdoanhthu','$trangthai')")){
          echo "<script>
          alert('Thêm thành công !');required</script>";
        }else {
          echo "<script>
          alert('Thêm thất bại !');</script>";
        }
      }
     
      $con->close();
    



?>
<h1>EBUS BOOKING</h1>
<center>
<h2>Quản lý doanh thu</h2></center>

<div class="container">
<form action="" method="POST">
          <div class="col-50">
           <h3>Thông tin cá nhân</h3>
           <label for="cname">Tên tuyến xe </label>
            <input type="text" id="cname" name="name" placeholder="Tên tuyến xe"required>
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
         <input type="text" id="sl" name="soluong" placeholder="Vui lòng nhập số lượng vé"required>
       </div>
       <div class="col-25">
         <label for="cvv">Giá vé</label>
         <input type="text" id="gv" name="ve" value="5000" placeholder="Gía vé">
       </div>
       <div class="col-25">
         <label for="cvv">Tổng doanh thu</label>
         <input type="text" id="tdt"  name="tongdoanhthu" placeholder="Tổng doanh thu là...">
       </div>
       <div class="col-25">
      <label for="cvv">Trạng thái</label>
                <select name="trangthai"  type="text" id="tdt" required >
                <optgroup label="Trạng thái ">
                <option value="Đã xử lý">Đã xử lý</option>
                <option value="Chưa xử lý">Chưa xử lý</option>
                </optgroup>
         
                          <!-- ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['name'];?></option>
                            ?php endwhile; ?> -->
                            </select>
           
                </div> 
   
       <input type="submit" value="Cập nhật"name="a"class="btn"required>
        </div>
       
        </div>
      </form>


    </div>
 
    <div class ="container">
<h2>Danh sách doanh thu </h2>
<div class="col-25">
    <form action=""method="POST">
      <input type="text" id="datatableid" placeholder="Tìm.." name="search"required>
       <button type="submit" class="w3-button w3-teal">Tìm kiếm </button>
    </form>
  </div>

<form name="Test"  >
    <table class="table table-bordered table-hover">
  
        <tr>
            <td> Mã nhà xe</td>
            <td> Tên nhà xe</td>
            <td>Số điện thoại</td>
            <td> Email</td>
            <td> Địa chỉ</td>
            <td> Số lượng vé</td>
            <td> Giá vé</td>
            <td> Tổng doanh thu</td>
            <td> Trạng thái</td>
            <td> </td>
            <td> </td>
       
        </tr>
        <?php
     require 'libs/db_connect.php';
     $limit=3;
     
     $page = isset($_GET['page']) ? $_GET['page'] : 1;
     $start = ($page - 1) * $limit;
    $result = $con ->query("SELECT * FROM doanhthu LIMIT $start, $limit");
    while($row=mysqli_fetch_array($result)):

      $result1 = $con ->query("SELECT count(id) AS id FROM doanhthu");
      $custCount = $result1->fetch_all(MYSQLI_ASSOC);
      $total = $custCount[0]['id'];
      $pages = ceil ($total / $limit);

      $truoc = $page -1;
      $sau = $page +1;
          ?>
          <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['sdt']; ?></td>
              <td><?php echo $row['email']; ?></td>  
              <td><?php echo $row['diachi']; ?></td>
              <td><?php echo $row['Soluong']; ?></td>
              <td><?php echo $row['Giave']; ?></td>  
              <td><?php echo $row['Tongdoanhthu']; ?></td>
              <td><?php echo $row['trangthai']; ?></td>
              <td><a href="doanhthu_xoa.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;"></i></a></td>
              <td><a href="doanhthu_sua.php?id=<?php echo $row['id']; ?>"><i class="fa fa-male" style="font-size:24px;"></a></td>   
          </tr>


       <?php endwhile; ?> 
               

    </table>
    <ul class="pagination">
    <li>
    <a href="?page=<?= $truoc; ?>" aria-label="truoc">
    <span aria-hidden="true">&laquo; Trước </span>
    </a></li>
          <?php for($i = 1; $i<= $pages; $i++) : ?>
   <li><a href="?page=<?= $i; ?>"><?= $i; ?></a></li>
          <?php endfor; ?>
   <li><a href="?page=<?= $sau; ?>" aria-label="sau">
    <span aria-hidden="true">&laquo; Sau </span>
    </a></li>
 </ul>

</form>
</body>
</html>
<a class="btn btn-info" href="http://localhost/mot/index.php">Trở về trang chủ</a>
<script src="tables/js/jquery.js"></script>
<script src="tables/js/dataTables.bootstrap.js"></script> 
<script src="tables/js/jquery.dataTables.js"></script>

<script>

    $(".search").DataTable();

    $(document).ready(function(){
      $("#datatableid").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".table tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script>
  $( "#sl" ).keyup(function() {
    let soluong = $(this).val();
    let gia = $('#gv').val();
    console.log({ soluong, gia });
    $('#tdt').val(Number(soluong) * Number(gia));
  });
  
</script>
