<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    $categories = $conn->query("SELECT * FROM categories");
    $categories->execute();
    $category = $categories->fetchAll(PDO::FETCH_OBJ);

    if(isset($_POST['submit'])) {

        $accept = ["jpg", "png", "gif", "webp"];

        $ext = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

        if($_POST['title'] == '' OR $_POST['subtitle'] == '' OR $_POST['body'] == '' OR $_POST['category_id'] == '') {

          echo '<div class="alert alert-danger text-center" role="alert">enter data into the inputs</div>';

        } else {

          if (in_array($ext, $accept)) {

              if($_FILES['image']['size'] <= 250000) {

                $title = $_POST['title'];
                $subtitle = $_POST['subtitle'];
                $body = $_POST['body'];
                $image = $_FILES['image']['name'];
                $user_id = $_SESSION['user_id'];
                $user_name = $_SESSION['username'];
                $category_id = $_POST['category_id'];
                
                
                $dir = 'images/' . basename($image);
    
                $insert = $conn->prepare("INSERT INTO posts (title, subtitle, body, category_id, img, user_id, user_name) VALUES (:title, :subtitle, :body, :category_id, :img, :user_id, :user_name)");
    
                $insert->execute([
    
                  ':title' => $title,
                  ':subtitle' => $subtitle,
                  ':body' => $body,
                  ':category_id' => $category_id,
                  ':img' => $image,
                  ':user_id' => $user_id,
                  ':user_name' => $user_name,
                  
    
                ]);
                
                if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
    
                  echo '<script> window.location.href = "http://127.0.0.1/clean-blog/"; </script>';
    
                }
  

            } else {

              echo "<script>alert('Veuillez choisir une image avec une taille maximal de 250 Ko');</script>";

            }

          } else {

            echo "<script>alert('Veuillez choisir une image avec une extension en PNG, JPG ou GIF');</script>";

          }
              
            
        }

    }




?>


            <form method="POST" action="create.php" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" />
            </div>

              <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"></textarea>
            </div>

            <div class="form-outline mb-4">
              <select name="category_id" class="form-select" aria-label="Default select example">
                  <option selected>Open this select menu</option>

                  <?php foreach($category as $cat) : ?>
                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                  <?php endforeach; ?>

              </select>
            </div>
              
             <div class="form-outline mb-4">
                <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
            </form>


           
<?php require "../includes/footer.php"; ?>
