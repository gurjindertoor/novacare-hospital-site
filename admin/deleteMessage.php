<?php
    include("../includes/conn.php");

    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM messages WHERE message_id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            // success
            header('Location: messages.php');
        } else {
            echo 'query error: '. mysqli_error($conn);
        }
    }
?>
