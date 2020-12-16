

    <?php
      include_once ('libs/db_connect.php');
      if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
      $id=$_GET['id'];
      $sql = "DELETE FROM ten WHERE id='$id'";
      if ($con->query($sql) === TRUE) 

      {
        echo "<script>
        alert('Xóa thành công !');</script>";
        header('Location: http://localhost/mot/danhsachtk.php');
      }else {
        echo "<script>
        alert('Xóa vé thất bại !');</script>";
      }
      $con->close();
      }
    
?>

