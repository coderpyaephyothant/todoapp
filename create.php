<?php
  require 'config.php';

  if(!empty($_POST)){
    $title = $_POST['title'];
    $description = $_POST['description'];
    // echo "$title,$description"; exit();

    $sql = "INSERT INTO todo( title, description) VALUES (:title,:description)";
    $pdo_stmt = $pdo->prepare($sql);
    $result = $pdo_stmt->execute(
      array(
        ':title' => $title,
        ':description' => $description
      )
    );
      if($result){
        echo "<script>alert('created new List!'); window.location.href='index.php'</script>";
      }

  };
  ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <form class="" action="create.php" method="post">

      <div class="card">

        <div class="card-body">
          <h2>Create New</h2>

          <div class="form-group">
            <label for="">Title</label>
            <input class="form-control" type="text" name="title" value="">
          </div>

          <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="8" cols="80"></textarea>

          </div> <br>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="Submit">
            <a href="index.php" class="btn btn-warning">Back</a>

          </div>

        </div>

      </div>
    </form>
    <script src="script.js"></script>
  </body>
</html>
