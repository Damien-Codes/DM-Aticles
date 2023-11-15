<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>


<?php
    if(!isset($_SESSION['adminname'])) {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/login-admins.php"; </script>';

    }

    if($_SESSION['lifetime'] < time()) {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/admins/logout.php"; </script>';
  
    }

    if(isset($_POST['submit'])) {

        if($_POST['name'] == '') {

          echo '<div class="alert alert-danger text-center" role="alert">enter data into the inputs</div>'; 

        } else {

            $name = htmlspecialchars($_POST['name']);



            //prepare request
            $insert = $conn->prepare("INSERT INTO categories (name) VALUES (:name)");

            $insert->execute([

                ':name' => $name,


            ]);

            echo '<script> window.location.href = "http://127.0.0.1/clean-blog/admin-panel/categories-admins/show-categories.php"; </script>';
        }

    }

?>



       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Categories</h5>
          <form method="POST" action="">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php require "../layouts/footer.php"; ?>