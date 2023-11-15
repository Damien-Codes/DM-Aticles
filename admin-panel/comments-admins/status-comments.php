<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>



<?php

    if(!isset($_SESSION['adminname'])) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';
    }

    if($_SESSION['lifetime'] < time()) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
    
      }

    if(isset($_GET['id']) && isset($_GET['status'])) {

        $id = htmlspecialchars($_GET['id']);
        $status = htmlspecialchars($_GET['status']);


        if($status == 0) {
      
                  $update = $conn->prepare("UPDATE comments SET status_comment = 1 WHERE id = '$id'");
                  $update->execute();

                  echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/comments-admins/show-comments.php"; </script>';

            } else {

                $update = $conn->prepare("UPDATE comments SET status_comment = 0 WHERE id = '$id'");
                $update->execute();

                echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/comments-admins/show-comments.php"; </script>';

            }

    } else {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';

    }

?>



<?php require "../layouts/footer.php"; ?>