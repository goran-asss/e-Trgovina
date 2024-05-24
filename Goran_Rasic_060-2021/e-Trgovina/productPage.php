<?php
    session_start();
    if (!isset($_SESSION['korisnik_id'])) {
        die(header("Location: index.php?error=2"));
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/index_style.css">
    <title>Document</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container">
            <a class="navbar-brand" href="productPage.php">
                <img src="Slike/technology-icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Tech Shop
            </a>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="productPage.php">Proizvodi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addProduct.php">Dodaj Proizvod</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="php/logoutProcess">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo($_SESSION['ime']. " " .$_SESSION['prezime'])?></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php

        include "php/db.php";

        $sql = "SELECT * FROM `proizvod`";
        $run = $conn->query($sql);

        if ($run) {
            $proizvodi = $run->fetch_all(MYSQLI_ASSOC);
        } else {
            // Ukoliko ne uspe upit, možete dodati odgovarajući kod za rukovanje greškom
        }
    ?>

    <div class="container">

        <?php 
            if(isset($_GET['success'])) 
            {
                if($_GET['success']==1){
                    echo '<div class="alert alert-success" role="alert">Uspesno ste se prijavili!</div>';
                }
                if($_GET['success']==2){
                    echo '<div class="alert alert-success" role="alert">Proizvod je uspesno dodat!</div>';
                }
                if($_GET['success']==3){
                    echo '<div class="alert alert-success" role="alert">Proizvod je uspesno obrisan!</div>';
                }
            } 
        ?>

        <div class="grid">

            <?php foreach ($proizvodi as $proizvod): ?>
            <div class="card">
                <img class="card-img-top" src="<?php echo $proizvod['slika']; ?>"
                    alt="<?php echo $proizvod['slika']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $proizvod['naziv']; ?></h5>
                    <h4 class="card-text"><?php echo ($proizvod['cena'] .  " $"); ?></h4>

                    <?php 
                        if($proizvod['dostupnost']==1){
                            echo ('<h6 class="card-text text-success"> DOSTUPNO </h6>' );
                        }
                        else{
                            echo ('<h6 class="card-text text-danger"> NEDOSTUPNO </h6>' );
                        }
                        ?>


                    <a href="productView.php?proizvod_id=<?php echo $proizvod['proizvod_id']; ?>"
                        class="btn btn-primary">Detalji</a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>


</body>

</html>