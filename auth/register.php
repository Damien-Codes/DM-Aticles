<?php  require "../includes/header.php"; ?>
<?php  require "../config/config.php"; ?>

<?php

    if(isset($_SESSION['username'])) {

      echo '<script> window.location.href = "http://127.0.0.1/clean-blog/"; </script>';

    }

    if(isset($_POST['submit'])) {

        if($_POST['email'] == '' OR $_POST['username'] == '' OR $_POST['password'] == '') {

          echo '<div class="alert alert-danger text-center" role="alert">enter data into the inputs</div>'; 

        } else {

            $email = $_POST['email'];
            $username = $_POST['username'];
            $mypassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            echo $email;
            echo $username;

            //prepare request
            $insert = $conn->prepare("INSERT INTO users (email, username, mypassword) VALUES (:email, :username, :mypassword)");

            $insert->execute([

                ':email' => htmlspecialchars($email),
                ':username' => htmlspecialchars($username),
                ':mypassword' => htmlspecialchars($mypassword)

            ]);

            echo '<script> window.location.href = "login.php"; </script>';

        }


    }












?>


            <form method="POST" action="register.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" />
               
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                
              </div>



              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Register</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Aleardy a member? <a href="login.php">Login</a></p>
                

               
              </div>
            </form>

<?php  require "../includes/footer.php"; ?>

           
