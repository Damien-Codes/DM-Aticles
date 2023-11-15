<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php  

    if(!isset($_SESSION['adminname'])) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';
    }

    if($_SESSION['lifetime'] < time()) {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
    
    }



    $delete = $conn->prepare("DELETE FROM comments WHERE status_comment = 0");

    $delete->execute();

    

    echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/comments-admins/show-comments.php"; </script>';


?>

