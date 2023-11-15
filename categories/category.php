<?php  require "../includes/header.php"; ?>
<?php  require "../config/config.php"; ?>

<?php

    if(isset($_GET['cat_id'])) {

        $id = htmlspecialchars($_GET['cat_id']);

        $posts = $conn->query("SELECT posts.id AS id, posts.title AS title, posts.subtitle AS subtitle, posts.user_name AS user_name, posts.created_at AS created_at, posts.category_id AS category_id, posts.status AS status FROM categories JOIN posts ON categories.id = posts.category_id WHERE categories.id = '$id' AND status = 1;");
        $posts->execute();
        $rows = $posts->fetchAll(PDO::FETCH_OBJ);

    } else {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';

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

<?php  require "../includes/footer.php"; ?>