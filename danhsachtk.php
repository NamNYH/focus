<!DOCTYPE html>
<html>
<head>
<title> Thêm nhân viên</title>
  
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
// $query= "SELECT * FROM `chucvu`";
// $result = mysqli_query($con, $query);

// $con = mysqli_connect($severname,$username,$password,$database);
if (isset($_POST['a'])) {
 
  $name = $_POST['cname'];
  $sdt = $_POST['expyear'];
  $email = $_POST['cvv'];
  $chucvu = $_POST['chucvu'];
  $memberID = $_POST['member'];
  $passMD5 = $_POST['pass'];
  $sonha = $_POST['Sonha'];
  $xom = $_POST['Xom'];
  $thon = $_POST['Thon'];
  $xa = $_POST['Xa'];
  $huyen = $_POST['Huyen'];
  $tinh = $_POST['Tinh'];
      $copy ="INSERT INTO  ten( name,sdt,email,tinh,chucvu)
             VALUES ('$name', '$sdt','$email','$tinh','$chucvu')";
      $run2 = mysqli_query($con,$copy);
      $copy2= "INSERT INTO diachi( sonha, xom, thon, xa, huyen, tinh)
                VALUES ('$sonha', '$xom','$thon','$xa', '$huyen','$tinh')";
      $run3 = mysqli_query($con,$copy2);

      
  //  $query= "INSERT INTO  customers( fullname, phone, email)
  //       VALUES ('$fullname', '$phone','$email')";
  //       $result=mysqli_query($con,$query);

  //   if($query)
  //       {
  //           $query2= "INSERT INTO diachi( sonha, xom, thon, xa, huyen, tinh)
  //           VALUES ('$sonha', '$xom','$thon','$xa', '$huyen','$tinh')";
  //       $result=mysqli_query($con,$query2);
  //       echo 'Thêm thành công ';
     
  //     }else {
  //       echo 'Thêm thất bại ';
  //     }
}
?>
<h1>EBUS BOOKING</h1>
<center>
<h2>Thêm nhân viên</h2></center>

<div class="container">
<form action="" method="POST">
          <div class="col-50">
           <h3>Thông tin cá nhân</h3>
           <label for="cname">Tên nhân viên</label>
            <input type="text" id="cname" name="cname" placeholder="Tên người dùng">
          <div class="row">
       
              <div class="col-25">
                <label for="expyear">Số điện thoại</label>
                <input type="text" id="expyear" name="expyear" placeholder="Số điện thoại">
              </div>          
              </div>
              <div class="col-25">
                <label for="cvv">Email người dùng</label>
                <input type="text" id="cvv" name="cvv" placeholder="Email người dùng">
              </div>
          
           
            <div class="row">
       <div class="col-25">
         <label for="expyear">Tài khoản</label>
         <input type="text" id="expyear" name="member" placeholder="Tài khoản">
       </div>
       <div class="col-25">
         <label for="cvv">Mật khẩu</label>
         <input type="text" id="cvv" name="pass" placeholder="Mật khẩu">
       </div>
       <div class="col-25">
      <label for="cvv">Chức vụ</label>
                <select name="chucvu"  type="text"id="cvv"  >
                <optgroup label="Chức vụ">
                <option value="Admin">Admin</option>
                <option value="Khách hàng">Khách hàng</option>
                <option value="Nhân viên bán vé">Nhân viên bán vé</option>
                <option value="Người giao hàng">Người giao hàng</option>
                </optgroup>
                          <!-- ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['name'];?></option>
                            ?php endwhile; ?> -->
                            </select>
           
                </div> 
                </div>
    <div class="row">
    
    <div class="col-50">
     <h3>Địa chỉ nhà</h3>
       
     <div class="row">
       
       <div class="col-25">
         <label for="expyear">Số nhà</label>
         <input type="text" id="expyear" name="Sonha" placeholder="Số nhà">
       </div>
       <div class="col-25">
         <label for="cvv">Xóm, làng</label>
         <input type="text" id="cvv" name="Xom" placeholder="Xóm, làng">
       </div>
       <div class="col-25">
         <label for="cvv">Thôn, ấp</label>
         <input type="text" id="cvv" name="Thon" placeholder="Thôn, ấp">
       </div>
       <div class="col-25">
         <label for="expyear">Xã, đường</label>
         <input type="text" id="expyear" name="Xa" placeholder="Xã, đường">
       </div>
       <div class="col-25">
         <label for="cvv">Huyện, quận</label>
         <input type="text" id="cvv" name="Huyen" placeholder="Huyện, quận">
       </div>
       <div class="col-25">
         <label for="cvv">Tỉnh, thành phố</label>
         <input type="text" id="cvv" name="Tinh" placeholder="Tỉnh, thành phố">
       </div>
        
       <input type="submit" value="Cập nhật"name="a"class="btn">
        </div>
       

      </form>


    </div>
 
    <div class ="container">
<h2>Danh sách chức vụ </h2>
<div class="col-25">
    <form action=""method="POST">
      <input type="text" id="datatableid" placeholder="Tìm.." name="search"required>
      <button type="submit" class="w3-button w3-red">Tìm kiếm </button>
    </form>
  </div>

<form name="Test"  >
    <table class="table table-bordered table-hover">
  
        <tr>
            <td> Mã</td>
            <td> Tên</td>
            <td>Số điện thoại</td>
            <td> Email</td>
            <td> Địa chỉ</td>
            <td> Chức vụ</td>
      
            <td> </td>
            <td> </td>
       
        </tr>
        <?php
     require 'libs/db_connect.php';
     $limit=3;
     
     $page = isset($_GET['page']) ? $_GET['page'] : 1;
     $start = ($page - 1) * $limit;
    $result = $con ->query("SELECT * FROM ten LIMIT $start, $limit");
    while($row=mysqli_fetch_array($result)):

      $result1 = $con ->query("SELECT count(id) AS id FROM ten");
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
              <td><?php echo $row['tinh']; ?></td>  
              <td><?php echo $row['chucvu']; ?></td>  
              <td><a href="danhsachtk_xoa.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;"></i></a></td>
              <td><a href="danhsachtk_sua.php?id=<?php echo $row['id']; ?>"><i class="fa fa-male" style="font-size:24px;"></a></td>   
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
