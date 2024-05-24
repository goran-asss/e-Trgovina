<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="css/login_reg_style.css">
    <title>Document</title>
</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="card text-white">
                    <div class="card-header">Prejavite se</div>
                    <div class="card-body">
                        <form action="php/loginProcess.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder=" Unesite email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Lozinka</label>
                                <input type="password" class="form-control" name="password" placeholder="Unesite lozinku" required>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Prijavi se</button>
                                <a href="register.php" class="btn btn-primary">Jos uvek nemate nalog?</a>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <?php 
                        if(isset($_GET['success'])) 
                        {
                          if($_GET['success']==1){
                            echo '<div class="alert alert-success" role="alert">Uspešno ste se registrovali.</div>';
                          }
                          if($_GET['success']==2){
                            echo '<div class="alert alert-success" role="alert">Uspešno ste se odjavili.</div>';
                          }
                        } 


                        if(isset($_GET['error'])) 
                        {
                          if($_GET['error']==1){
                            echo '<div class="alert alert-danger" role="alert">Korisnik sa unetim podacima ne postoji!</div>';
                          }
                          if($_GET['error']==2){
                            echo '<div class="alert alert-danger" role="alert">Prvo se morate prijaviti!</div>';
                          }
                        } 
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>

</body>

</html>