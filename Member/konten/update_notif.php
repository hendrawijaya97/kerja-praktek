<?php 
include '../connect.php';
 $id_up = $_GET['id_up'];

               
                $upd = "UPDATE tblservice SET notif = 1 WHERE id_service = $id_up"; 
                $run = $connect->query($upd);

                if($run){
  
                  echo '<script>document.location.href="index.php?page=view_history";</script>';
                }else{ 
                  
                  echo '<script>document.location.href="index.php?page=view_history";</script>';
                }

?>