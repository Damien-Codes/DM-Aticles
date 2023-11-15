<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php  

    if(!isset($_SESSION['adminname'])) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';
    }

    if($_SESSION['lifetime'] < time()) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
    
      }

    if(isset($_GET['del_id'])) {

        $id = htmlspecialchars($_GET['del_id']);


        $delete = $conn->prepare("DELETE FROM comments WHERE id = :id");

        $delete->execute([

            ':id' => $id

        ]);

        

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/comments-admins/show-comments.php"; </script>';

    } else {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';

    }

?>

