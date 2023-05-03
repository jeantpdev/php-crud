<?php include('database/db.php')?>

<?php include('includes/header.php')?>

<nav class="navbar bg-dark "data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CRUD PHP</a>
  </div>
</nav>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
        <div class="card card-body">
            <form action="save_task.php" method = "POST">
                <div class="form-group">
                    <!-- los name son como se puede llamar dentro de php-->
                    <input type = "text" name = "title" class = "form-control" placeholder = "Titulo de la tarea">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name = "description" placeholder = "Descripcion de la tarea" id="floatingTextarea"></textarea>
                </div>
                <input type = "submit" name = 'save_ask' class = "btn btn-success btn-block" value = "Save task">
                
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <table class = "table table-bordered">
          <thead>
            <tr>
              <th>title</th>
              <th>description</th>
              <th>created_at</th>
            </tr>
          </thead>
          <tbody>
            <?php

              $query = "SELECT * FROM task";
              $result_tasks =mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result_tasks)){ ?>
                <tr>
                  <td> <?php echo $row['title'] ?> </td>
                  <td> <?php echo $row['description'] ?> </td>
                  <td> <?php echo $row['created_at'] ?> </td>
                  <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>"><i class="fa-regular fa-pen-to-square fa-2x"></i></a>
                    <a href="delete_task.php?id=<?php echo $row['id'] ?>"><i class="fa-solid fa-trash fa-2x"></i></a>
                  </td>
                </tr>
              <?php } ?>
          </tbody>
        </table>
    </div>
  </div>
</main>

<?php include ('includes/footer.php')?>
