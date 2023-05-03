<?php

    include('database/db.php');

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM task WHERE id =$id";
        $result_query = mysqli_query($conn, $query);

        if (!$result_query){
            die ('error');
        }

        header("location: index.php");
    }


?>