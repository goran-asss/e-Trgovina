<?php
    include "db.php";

    session_start();

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $password_hash = md5($password);


    $sql = "SELECT * FROM korisnik WHERE email = '$email' AND password = '$password_hash' ";
    $run = $conn->query($sql);

    if($run -> num_rows == 1){
        $results = $run->fetch_assoc();

        var_dump($results);
       
        
        $_SESSION['korisnik_id'] = $results['korisnik_id'];
        $_SESSION['ime'] = $results['ime'];
        $_SESSION['prezime'] = $results['prezime'];
        $_SESSION['email'] = $results['email'];

        var_dump($_SESSION);

        header("Location: ../productPage.php?success=1");
    }
    else
    {
        die(header("Location: ../index.php?error=1"));
    }









?>