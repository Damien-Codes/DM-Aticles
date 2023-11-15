<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php  

    if(isset($_GET['del_id'])) {

        $id = htmlspecialchars($_GET['del_id']);

        $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
        $select->execute();
        $posts = $select->fetch(PDO::FETCH_OBJ);

        if($_SESSION['user_id'] != $posts->user_id){ 

          echo '<script> window.location.href = "http://127.0.0.1/clean-blog/"; </script>';
  
          } else {

            unlink("images/$posts->img");     



            $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");

            $delete->execute([

                ':id' => htmlspecialchars($id)

            ]);

          }

        

          echo '<script> window.location.href = "http://127.0.0.1/clean-blog/"; </script>';

    } else {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';

    }

?>

<?php require "../includes/footer.php"; ?>