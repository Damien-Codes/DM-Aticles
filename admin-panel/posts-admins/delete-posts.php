<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

    if(!isset($_SESSION['adminname'])) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';
    }

    if($_SESSION['lifetime'] < time()) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
    
      }

    if(isset($_GET['po_id'])) {

    $id = htmlspecialchars($_GET['po_id']);

    $select = $conn->query("SELECT * FROM posts WHERE id = '$id'");
    $select->execute();
    $posts = $select->fetch(PDO::FETCH_OBJ);

        unlink("../posts/images/$posts->img"); 

        $delete = $conn->prepare("DELETE FROM posts WHERE id = :id");

        $delete->execute([

            ':id' => $id

        ]);




        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/posts-admins/show-posts.php"; </script>';

    } else {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';

    }

?>


<?php require "../layouts/footer.php"; ?>