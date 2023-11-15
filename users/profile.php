<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    if(isset($_GET['prof_id'])) {

 
      if(sha1($_SESSION['user_id']) == $_GET['prof_id']) {

        $id = htmlspecialchars($_SESSION['user_id']);

        //first query
        $select = $conn->query("SELECT * FROM users WHERE id = '$id'");
        $select->execute();
        $rows = $select->fetch(PDO::FETCH_OBJ);

        
        if($_SESSION['user_id'] != $rows->id){ 

          echo '<script> window.location.href = "http://127.0.0.1/clean-blog/"; </script>';

        }
        //seconde query
        if(isset($_POST['submit'])) {

            if($_POST['email'] == '' OR $_POST['username'] == '') {

                echo 'one or more inputs are empty';
    
            } else {

              
                    
                $email = htmlspecialchars($_POST['email']);
                $username = htmlspecialchars($_POST['username']);

    
                $update = $conn->prepare("UPDATE users SET email = :email, username = :username WHERE id = '$id'");
                $update->execute([
    
                  ':email' => $email,
                  ':username' => $username,


                ]);
                
                echo '<script> window.location.href = "http://127.0.0.1/clean-blog/users/profile.php?prof_id='. sha1($_SESSION['user_id']) .'"; </script>';

            }

        }

        

      } else {

        echo '<script> window.location.href = "http://127.0.0.1/clean-blog/users/profile.php?prof_id='. sha1($_SESSION['user_id']) .'"; </script>';

      }
    } else {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/404.php"; </script>';


    }

?>

            <form method="POST" enctype="multipart/form-data" action="profile.php?prof_id=<?php echo $id; ?>">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" value="<?php echo $rows->email; ?>" id="form2Example1" class="form-control" placeholder="email" />
               
            </div>

              <div class="form-outline mb-4">
                <input type="text" name="username" value="<?php echo $rows->username; ?>" id="form2Example1" class="form-control" placeholder="username" />
            </div>

              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
            </form>


           
<?php require "../includes/footer.php"; ?>