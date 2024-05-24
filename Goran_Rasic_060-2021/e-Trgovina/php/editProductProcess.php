<?php
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    $dostupan = $_POST['dostupan'];


    $query = "UPDATE proizvod SET naziv='$naziv', cena='$cena', dostupnost='$dostupan' WHERE proizvod_id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../productView.php?proizvod_id=$id&success=1");
    } else {
        echo "Greška pri ažuriranju proizvoda: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}





?>