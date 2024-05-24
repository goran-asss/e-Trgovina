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

        <div class="container">

        

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 add-product-form">


                    <form action="php/addProductProcess.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="naziv">Naziv proizvoda:</label>
                            <input type="text" class="form-control" id="naziv" name="naziv" required>
                        </div>
                        <div class="form-group">
                            <label for="cena">Cena:</label>
                            <input type="number" class="form-control" id="cena" name="cena" step="0.001" min="0" required>
                        </div>

                        <div class="form-group">
                            <label for="dostupan">Dostupan:</label>
                            <select class="form-control" id="dostupan" name="dostupan" required>
                                <option value="1">Da</option>
                                <option value="0">Ne</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slika">Slika:</label>
                            <input type="file" class="form-control-file" id="slika" name="slika" required accept="imgs/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj proizvod</button>
                    </form>







                </div>
                <div class="col-3"></div>
            </div>



        
        </div>



   
    
</body>
</html>