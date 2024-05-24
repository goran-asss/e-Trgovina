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

        $proizvod_id = $_GET['proizvod_id'];

        

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
    ?>

    <div class="container">

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 add-product-form">


                <form action="php/editProductProcess.php" method="POST">
                    <div class="form-group">
                        <label for="naziv">Naziv proizvoda:</label>
                        <input type="text" class="form-control" id="naziv" name="naziv"
                            value="<?php echo $proizvod['naziv']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cena">Cena:</label>
                        <input type="number" class="form-control" id="cena" name="cena" step="0.001" min="0"
                            value="<?php echo $proizvod['cena']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="dostupan">Dostupan:</label>
                        <select class="form-control" id="dostupan" name="dostupan" required>
                            <option value="1" <?php if ($proizvod['dostupnost'] == 1) echo 'selected'; ?>>Da</option>
                            <option value="0" <?php if ($proizvod['dostupnost'] == 0) echo 'selected'; ?>>Ne</option>
                        </select>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $proizvod['proizvod_id']; ?>">

                    <button type="submit" class="btn btn-primary">Izmeni</button>
                </form>







            </div>
            <div class="col-3"></div>
        </div>




    </div>





</body>

</html>