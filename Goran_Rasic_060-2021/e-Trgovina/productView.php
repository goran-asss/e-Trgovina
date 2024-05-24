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
    <link rel="stylesheet" href="css/product_view_style.css">
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


        if (isset($_GET['proizvod_id'])) {
            $proizvod_id = $_GET['proizvod_id'];
        
            $sql = "SELECT * FROM proizvod WHERE proizvod_id = $proizvod_id";
            $result = $conn->query($sql);
        
            if ($result && $result->num_rows > 0) {
                $proizvod = $result->fetch_assoc();
            }

            
        } else {

            echo "Nije prosleđen ID proizvoda.";

        }



        $sql = "SELECT r.recenzija_id, r.proizvod_id, k.ime, k.prezime, r.ocena, r.komentar
                FROM recenzije r
                JOIN korisnik k ON r.korisnik_id = k.korisnik_id
                WHERE r.proizvod_id = $proizvod_id;";
        $run = $conn->query($sql);

        if ($run) {
            $rezenzije = $run->fetch_all(MYSQLI_ASSOC);
        } else {
            // Ukoliko ne uspe upit, možete dodati odgovarajući kod za rukovanje greškom
        }

    ?>

    <div class="container">

        <?php 
                if(isset($_GET['success'])) 
                {
                    if($_GET['success']==1){
                        echo '<div class="alert alert-success" role="alert">Uspesno ste izmenili proizvod!</div>';
                    }
                    if($_GET['success']==2){
                        echo '<div class="alert alert-success" role="alert">Uspesno ste dodali recenziju!</div>';
                    }
                    if($_GET['success']==3){
                        echo '<div class="alert alert-success" role="alert">Uspesno ste obrisali recenziju!</div>';
                    }
                } 
            ?>

        <div class="row">
            <div class="col-3"></div>

            <div class="col-6">

                <div class="product-view">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $proizvod['slika']; ?>" alt="Card image cap">
                        <div class="card-body d-flex justify-content-between">



                            <div>
                                <h5 class="card-title"><?php echo $proizvod['naziv']; ?></h5>
                                <h4 class="card-text"><?php echo $proizvod['cena'] . " $"; ?></h4>
                                <?php 
                                    if($proizvod['dostupnost']==1){
                                        echo ('<h6 class="card-text text-success"> DOSTUPNO </h6>' );
                                    }
                                    else{
                                        echo ('<h6 class="card-text text-danger"> NEDOSTUPNO </h6>' );
                                    }
                                    ?>
                            </div>

                            <div class="btns">
                                <form action="php/deleteProductProcess.php" method="POST">
                                    <input type="hidden" name="proizvod_id"
                                        value="<?php echo $proizvod['proizvod_id']; ?>">
                                    <button type="submit" class="btn btn-danger">Obriši</button>
                                </form>

                                <form action="editProduct.php" method="GET">
                                    <input type="hidden" name="proizvod_id"
                                        value="<?php echo $proizvod['proizvod_id']; ?>">
                                    <button type="submit" class="btn btn-primary">Izmeni</button>
                                </form>
                            </div>




                        </div>
                    </div>
                </div>


                <div class="add-review">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Dodaj recenziju</h5>
                            <form action="php/addComment.php?proizvod_id=<?php echo ($proizvod_id); ?>" method="POST">
                                <div class="form-group">
                                    <label for="ocena">Ocena:</label>
                                    <select class="form-control" id="ocena" name="ocena">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="komentar">Komentar:</label>
                                    <textarea class="form-control" id="komentar" name="komentar" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Objavi recenziju</button>
                            </form>
                        </div>
                    </div>
                </div>



                <div class="other-review">
                    <?php foreach ($rezenzije as $rezenzija): ?>
                    <div class="card review">
                        <div class="card-body ">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">
                                        <?php echo ($rezenzija['ime']. ' ' .$rezenzija['prezime'] ); ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Ocena:
                                        <?php echo ($rezenzija['ocena']); ?></h6>

                                </div>
                                <form action="php/deleteComment.php" method="POST">
                                    <input type="hidden" name="proizvod_id" value="<?php echo $proizvod_id; ?>">
                                    <input type="hidden" name="recenzija_id"
                                        value="<?php echo $rezenzija['recenzija_id']; ?>">
                                    <button type="submit" class="btn btn-danger">Obriši</button>
                                </form>
                            </div>
                            <p class="card-text"><?php echo ($rezenzija['komentar']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

            </div>

            <div class="col-3"></div>



        </div>






    </div>




</body>

</html>