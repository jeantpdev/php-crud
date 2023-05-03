<?php
    /* se incluye el archivo que contiene la conexion a la base de datos */
    include('database/db.php');
    
    /* si dentro de la peticion post que recibe, hay un boton llamado save_task */
    /* $_POST ES UN ARRAY QUE CONTIENE OS VALORES ENVIADOS MEDIANTE LA PETICION */
    if (isset($_POST['save_task'])){
        /* Dentro de $_POST, se encuentra title y description*/
        $title = $_POST['title'];
        $description = $_POST['description'];
        /* IMPORTANTE NO USAR COMILLAS DOBLES O SIMPLES JUNTAS*/
        $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $query);
        /* Se realiza la consulta a la bd y el resultado se guarda dentro de $result */

        /* si no hay result alguno, muere la aplicacion */
        if(!$result){
            die('Query failed');
        }
        /*si se completa la peticion, se redirige al index.php */
        header("location: index.php");

    }


?>