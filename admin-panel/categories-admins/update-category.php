<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

    if(!isset($_SESSION['adminname'])) {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';
    }

    if($_SESSION['lifetime'] < time()) {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
  
    }

    if(isset($_GET['up_id'])) {

        $id = htmlspecialchars($_GET['up_id']);

        //first query
        $select = $conn->query("SELECT * FROM categories WHERE id = '$id'");
        $select->execute();
        $rows = $select->fetch(PDO::FETCH_OBJ);

        
        // if($_SESSION['user_id'] != $rows->user_id){ 

        //   header('location: http://127.0.0.1/clean-blog/index.php');

        // }
        //seconde query
        if(isset($_POST['submit'])) {

            if($_POST['name'] == '') {

                echo '<div class="alert alert-danger text-center" role="alert">enter again image into the input</div>'; 
    
            } else {

                  $name = htmlspecialchars($_POST['name']);
      
                  $update = $conn->prepare("UPDATE categories SET name = :name WHERE id = '$id'");
                  $update->execute([
      
                    ':name' => $name,
  
                  ]);

                  echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/categories-admins/show-categories.php"; </script>';

            }

        }
    } else {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';

    }

?>


       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Categories</h5>
          <form method="POST" action="" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" value="<?php echo $rows->name; ?>" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php require "../layouts/footer.php"; ?>