<!DOCTYPE html>
<html>
<head>
<title> Chức vụ</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
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
<body>
<?php require_once ("libs/db_connect.php"); ?>
<?php
require_once ("libs/db_connect.php");
        // $query= "SELECT * FROM `customers`";
        // $result = mysqli_query($con, $query);



if (isset($_POST['chucvu'])) {
 
  $name = $_POST['Name'];
  $mota = $_POST['Mota'];


  
  if($con -> query("INSERT INTO chucvu(name,mota)
        VALUES ('$name', '$mota')")){
          echo "<script>
          alert('Thêm thành công !');</script>";
       
        }else {
          echo "<script>
          alert('Thêm thất bại !');</script>";
        }
      }
     
      $con->close();
?>
<h1>EBUS BOOKING</h1>
<center><h1>Chức vụ</h1></center>

<div class="container">
<h2> Thêm chức vụ </h2>
  <form action=""  method="POST">
  <div class="row">
    <div class="col-25">
      <label for="name">Chức vụ</label>
    </div>
    <div class="col-75">
      <input type="text"  name="Name" placeholder="Thêm chức vụ.."required>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="subject">Nhiệm vụ</label>
    </div>
    <div class="col-75">
      <textarea id="subject" name="Mota" placeholder="Mô tả nhiệm vụ.." style="height:200px" required></textarea>
    </div>
  </div>
  <!-- <div class="row">
    <div class="col-25">
      <label for="subject">Nhiệm vụ</label>
    </div>
  <div class= "col-75">
                <select name="loaive"  type="Loaive" class="nam">
              
                          ?php while($row = mysqli_fetch_array($result)):?>
                            <option value="?php echo $row['id'];?>">?php echo $row['fullname'];?></option>
                            ?php endwhile; ?>
                            </select>
                </div>
                </div> -->
  <div class="row">
    <input type="submit" value="Thêm"name= "chucvu">
  </div>

  </form>
</div>

<div class ="container">

<h2>Danh sách chức vụ </h2>

<div class="col-25">
    <form  action="" method="POST">
      <input id="datatableid" type="text" placeholder="Tìm.." name="search"required>
      <button type="submit">Tìm kiếm</button>
    </form>

  </div>

<form name="Test"  >
    <table class="table table-bordered table-hover">
  
        <tr>
            <td> Mã</td>
            <td> Tên</td>
            <td> Công việc</td>
            <td> </td>
            <td> </td>
       
        </tr>
    

        <?php
      
         require 'libs/db_connect.php';
         $limit=3;
         
         $page = isset($_GET['page']) ? $_GET['page'] : 1;
         $start = ($page - 1) * $limit;
        $result = $con ->query("SELECT * FROM chucvu LIMIT $start, $limit");
        while($row=mysqli_fetch_array($result)):

          $result1 = $con ->query("SELECT count(id) AS id FROM chucvu");
          $custCount = $result1->fetch_all(MYSQLI_ASSOC);
          $total = $custCount[0]['id'];
          $pages = ceil ($total / $limit);

          $truoc = $page -1;
          $sau = $page +1;
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['mota']; ?></td>
            <td><a href="chucvu_xoa.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" style="font-size:24px;"></i></a></td>
            <td><a href="chucvu_sua.php?id=<?php echo $row['id']; ?>"><i class="fa fa-male" style="font-size:24px;"></a></td>

          
    
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
