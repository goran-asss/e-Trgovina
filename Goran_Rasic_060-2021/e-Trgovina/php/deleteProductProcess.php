<?php

    include 'db.php';

    $proizvod_id = $_REQUEST['proizvod_id'];

    $sql = "DELETE FROM proizvod WHERE proizvod_id = $proizvod_id";

    if ($conn->query($sql)) {
        header("Location: ../productPage.php?success=3");
    } else {
        echo "Greška prilikom brisanja proizvoda: " . $conn->error;
    }


?>