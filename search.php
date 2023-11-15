<?php  require "includes/header.php"; ?>
<?php  require "config/config.php"; ?>

<?php 

    if(isset($_POST['search'])) {

        if($_POST['search'] == '') {

            echo "<script>alert('Veuillez insérer une recherche non vide s'il vous plaît'); </script>";

        } else {

            $search = htmlspecialchars($_POST['search']);

            $data = $conn->prepare("SELECT * FROM posts WHERE title LIKE '%$search%' AND status = 1 OR user_name LIKE '%$search%' AND status = 1 ORDER BY id DESC");

            $data->execute();

            $rows = $data->fetchAll(PDO::FETCH_OBJ);

            if($data->rowCount() == 0) {

                echo "<script>alert('No result'); </script>";
                echo '<script> window.location.href = "http://127.0.0.1/clean-blog/"; </script>';

            } 
 
        }


    }

?>

<div class="row gx-4 gx-lg-5 justify-content-center">

    <div class="col-md-10 col-lg-8 col-xl-7">

        <?php //echo 'hello ' . $_SESSION['username']; ?>

        <?php foreach($rows as $row) : ?>

        <!-- Post preview-->
        <div class="post-preview">
            <a href="http://127.0.0.1/clean-blog/posts/post.php?post_id=<?php echo $row->id; ?>">
                <h2 class="post-title"><?php echo $row->title; ?></h2>
                <h3 class="post-subtitle"><?php echo $row->subtitle; ?></h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!"><?php echo $row->user_name; ?></a>
                on <?php echo $row->created_at; ?>
            </p>
        </div>
        <!-- Divider-->
        <hr class="my-4" />
        
        <?php endforeach; ?>
        
        <!-- Pager-->
        
    </div>
</div>

<?php  require "includes/footer.php"; ?>