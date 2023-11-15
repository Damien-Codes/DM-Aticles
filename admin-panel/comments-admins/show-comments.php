<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php 

        if(!isset($_SESSION['adminname'])) {

          echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';
        }

        if($_SESSION['lifetime'] < time()) {

          echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
      
        }

        $comments = $conn->query("SELECT comments.id AS id, posts.title AS title, comments.id_post_comment AS id_post_comment, comments.user_name_comment AS user_name_comment, comments.comment AS comment, comments.created_at AS created_at, comments.status_comment AS status_comment FROM comments JOIN posts ON  posts.id = comments.id_post_comment;");
        $comments->execute();
        $rows = $comments->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Comments</h5>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">category</th>
                    <th scope="col">user</th>
                    <th scope="col">status</th>
                    <th scope="col">delete <button class="btn btn-danger text-white confirm">All</button></th>
                    
                    <script>
                    
                      let button = document.getElementsByClassName("confirm")[0];
                      button.onclick = function() {
                        const response = confirm("Are you sure you want to delete all?");
                        if(response) {
                          window.location.href = "http://127.0.0.1/clean-blog/admin-panel/comments-admins/delete-all-comments.php";
                        }
                      };
                    
                    </script>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($rows as $row): ?>
                  <tr>
                    <th scope="row"><?php echo $row->id_post_comment; ?></th>
                    <td><?php echo $row->title; ?></td>
                    <td><?php echo "<p class=\"comment\">$row->comment</p>"; ?></td>
                    <td><?php echo $row->user_name_comment; ?></td>

                    <?php if($row->status_comment == 0) : ?>
                      <td><a href="status-comments.php?status=<?php echo $row->status_comment; ?>&id=<?php echo $row->id; ?>" class="btn btn-danger  text-center ">deactivated</a></td>
                    <?php else : ?>
                      <td><a href="status-comments.php?status=<?php echo $row->status_comment; ?>&id=<?php echo $row->id; ?>" class="btn btn-primary  text-center ">activated</a></td>
                    <?php endif; ?>


                    <td><a href="delete-comments.php?del_id=<?php echo $row->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php"; ?>
