<?php
 require 'config.php';

 if(!empty($_POST)){
   $title=$_POST['title'];
   $description = $_POST['description'];
   $id = $_POST['id'];
   $pdo_statement = $pdo->prepare("UPDATE todo SET title='$title', description='$description' WHERE id='$id'");
   $result2 =  $pdo_statement->execute();
   // echo "$result2"; exit();
   if($result2){
   echo "<script>alert('Updated List!'); window.location.href='index.php'</script>";
   }
 }else{
   $pdo_stmt = $pdo->prepare("SELECT * FROM todo WHERE  id=".$_GET['id']);
   $pdo_stmt->execute();
   $result = $pdo_stmt->fetchAll();
   // print"<pre>";
   // print_r($result);exit();

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

    <form class="" action="edit.php" method="post">

      <div class="card">

        <div class="card-body">
          <h2>Edit data</h2>
          <input type="hidden" name="id" value="<?php echo $result [0] ['id'] ?>">
          <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title'] ?>">
          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" rows="8" cols="80"><?php echo $result[0]['description'] ?></textarea>

          </div> <br>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="Upadate">
            <a href="index.php" class="btn btn-warning">Back</a>

          </div>

        </div>

      </div>
    </form>
    <script src="script.js"></script>
  </body>
</html>
