<?php
include "db.php";


$naziv=$_REQUEST['naziv'];
$cena=$_REQUEST['cena'];
$dostupnost=$_REQUEST['dostupan'];




var_dump ($naziv,$cena,$dostupnost);

if (isset($_FILES["slika"]) && $_FILES["slika"]["error"] == UPLOAD_ERR_OK) {
    $target_dir = "../imgs/";
    $slika_naziv = uniqid() . "_" . basename($_FILES["slika"]["name"]);
    $target_file = $target_dir . $slika_naziv;
    $url = "imgs/" . $slika_naziv;

    if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
        var_dump($url);
        $sql ="INSERT INTO proizvod(proizvod_id, naziv, cena, dostupnost, slika) VALUES (?,?,?,?,?)";
        $run=$conn->prepare($sql);
        $run->bind_param("sssss", $proizvod_id, $naziv, $cena, $dostupnost, $url);
        $run->execute();

        if($run){
            header("Location: ../productPage.php?success=2");
        } else {
            header("Location: ../addProduct.php?error=1");
        }

    } else {
        echo "Došlo je do greške pri otpremanju slike na server.";
    }
}




 



?>