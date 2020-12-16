 
<!DOCTYPE html>
<html>
<head>
<title> DANH SÁCH KHÁCH HÀNG ĐẶT VÉ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>


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





</style>
</head>
<body>
<h1>EBUS BOOKING</h1>
<center>
<h1>QUẢN LÝ HÓA ĐƠN VÉ</h1></center>

<div class ="container">
<div class="col-25">
    <form action=""method="POST">
      <input type="text" id="datatableid" placeholder="Tìm.." name="search"required>
      <button type="submit">Tìm kiếm </button>
    </form>
  </div>

<form name="Test"  method="post" action="" onsubmit="return check();">
    <table class="table table-bordered table-hover">
  
        <tr> 
            <td> Id</td>
            <td> Name</td>
            <td> Email</td>
            <td> sdt</td>
            <td> Địa chỉ</td>
            <td> Số lượng vé</td>
            <td> Giá vé</td>
            <td> Loại vé</td>
            <td> Tổng giá</td>   
            <td> Hình thức thanh toán</td>
            <td> Trạng thái</td>
            <td> Xóa</td>
            <td> Sửa</td>
 
        </tr>
      
        <?php
        require 'libs/db_connect.php';
        // $result = $con ->query("SELECT * FROM datve");
        // while($row=mysqli_fetch_array($result)):
          $limit=3;
     
     $page = isset($_GET['page']) ? $_GET['page'] : 1;
     $start = ($page - 1) * $limit;
    $result = $con ->query("SELECT * FROM datve LIMIT $start, $limit");
    while($row=mysqli_fetch_array($result)):

      $result1 = $con ->query("SELECT count(id) AS id FROM datve");
      $custCount = $result1->fetch_all(MYSQLI_ASSOC);
      $total = $custCount[0]['id'];
      $pages = ceil ($total / $limit);

      $truoc = $page -1;
      $sau = $page +1;
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['sdt']; ?></td>
            <td><?php echo $row['diachi']; ?></td>
            <td><?php echo $row['soluong']; ?></td>
            <td><?php echo $row['giave']; ?></td>
            <td><?php echo $row['loaive']; ?></td> 
            <td><?php $total = $row['soluong'] * $row['giave']; 
            echo $total; ?></td>
              <td><?php echo $row['hinhthuc']; ?></td>
            <td><?php echo $row['trangthai']; ?></td> 
            <!-- <td> <div class="col-25">
  
                <select name="trangthai"  type="text" id="tdt" required >
              
                <option value="Đã xử lý">Đã xử lý</option>
                <option value="Chưa xử lý">Chưa xử lý</option> -->
              
         
                          <!-- ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['name'];?></option>
                            ?php endwhile; ?> -->
                            </select>
           
                </div> </td>
          
            <td><a href="datve_xoa.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;"></i></a></td>
            <td><a href="datve_sua.php?id=<?php echo $row['id']; ?>"><i class="fa fa-male" style="font-size:24px;"></a></td>
     
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
</body>  
</html>
<a class="btn btn-primary" href="http://localhost/mot/index.php">Trở về trang chủ</a>
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
