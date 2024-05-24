<?php

session_start();

if(isset($_SESSION['korisnik_id'])) {
    session_unset();
    session_destroy();
}

die(header("Location: ../index.php?success=2"));
?>