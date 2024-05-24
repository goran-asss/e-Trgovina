<?php

    include 'db.php';



    $proizvod_id=$_REQUEST['proizvod_id'];


    $recenzija_id = $_REQUEST['recenzija_id'];

    $sql = "DELETE FROM recenzije WHERE recenzija_id = $recenzija_id";

    if ($conn->query($sql)) {
        header("Location: ../productView.php?proizvod_id=$proizvod_id&success=3");
    } else {
        echo "Greška prilikom brisanja recenzije: " . $conn->error;
    }


?>