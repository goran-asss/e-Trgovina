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
                    <div class="card-header">Napravi nov nalog</div>
                    <div class="card-body">
                        <form action="php/registerProcess.php" method="POST">
                            <div class="form-group">
                                <label for="name">Ime</label>
                                <input type="name" class="form-control" name="ime" placeholder="Unesite ime" required>
                            </div>
                            <div class="form-group">
                                <label for="surname">Prezime</label>
                                <input type="surname" class="form-control" name="prezime" placeholder="Unesite prezime" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Unesite email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Lozinka</label>
                                <input type="password" class="form-control" name="password" placeholder="Unesite lozinku" required>
                            </div>
                            <div class="form-group">
                                <label for="repassword">Re-Lozinka</label>
                                <input type="password" class="form-control" name="repassword" placeholder="Ponovo unesite lozinku" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Registruj se</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <?php 
                        if(isset($_GET['success'])) 
                        {
                         
                        } 


                        if(isset($_GET['error'])) 
                        {
                          if($_GET['error']==1){
                            echo '<div class="alert alert-danger" role="alert">Lozinke se na poklapaju!</div>';
                          }
                          if($_GET['error']==2){
                            echo '<div class="alert alert-danger" role="alert">Korisnik sa unetim email-om vec postoji!</div>';
                          }
                          if($_GET['error']==3){
                            echo '<div class="alert alert-danger" role="alert">Neuspesno registrovanje! Pokusajte ponovo!</div>';
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