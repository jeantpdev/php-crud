<?php include('database/db.php') ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if (isset($_POST['update_task'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = $id";
    $result_query = mysqli_query($conn, $query);

    if (!$result_query) {
        die('error');
    }


    header("location: index.php");

}




?>

<?php include('includes/header.php') ?>


<nav class="navbar bg-dark " data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">CRUD PHP</a>
    </div>
</nav>

<div class="container">
    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
            <!-- los name son como se puede llamar dentro de php-->
            <input type="text" name="title" class="form-control" placeholder="Titulo de la tarea" value=<?php echo $title; ?>>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description"
                placeholder="Descripcion de la tarea"><?php echo $description; ?></textarea>
        </div>
        <input type="submit" name='update_task' class="btn btn-success btn-block" value="Update task">

    </form>
</div>

<?php include('includes/footer.php') ?>