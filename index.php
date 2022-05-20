<?php
require 'config.php';

 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Home</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
   </head>
   <body>

     <?php
     $pdo_stmt = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
     $pdo_stmt->execute();
     $result = $pdo_stmt->fetchAll();
        ?>

     <div class="card">
       <div class="card-body">
         <h2>To do App home page</h2> <br>
         <a type="button" class="btn btn-success" href="create.php">Create</a> <br> <br>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Titile</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              if($result){

                foreach ($result as $value) {
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $value['title'] ?></td>
                    <td><?php echo $value['description'] ?></td>
                    <td><?php echo date('d-m-Y',strtotime($value['created_at'] ))?></td>

                    <td>
                      <a type="button" class="btn btn-primary" href="edit.php?id=<?php echo $value['id'] ?>">Edit</a>
                      <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value['id'] ?>">Delete</a>
                    </td>
                  </tr>
                  <?php
                  $i ++;
                }
              }
               ?>

            </tbody>
          </table>
       </div>

     </div>
     <script src="script.js"></script>
   </body>
 </html>
