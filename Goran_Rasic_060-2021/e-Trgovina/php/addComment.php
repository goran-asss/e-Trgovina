<?php
include "db.php";

session_start();



$proizvod_id=$_GET['proizvod_id'];
$korisnik_id=$_SESSION['korisnik_id'];
$ocena=$_REQUEST['ocena'];
$komentar=$_REQUEST['komentar'];

var_dump ($proizvod_id);
var_dump ($komentar);
var_dump ($ocena);
var_dump ($korisnik_id);



$sql ="INSERT INTO recenzije(proizvod_id, korisnik_id, ocena, komentar) VALUES (?,?,?,?)";
$run=$conn->prepare($sql);
$run->bind_param("ssss",$proizvod_id,$korisnik_id,$ocena,$komentar);
$run -> execute();

if($run){
    header("Location: ../productView.php?proizvod_id=$proizvod_id&success=2");
}
else
{
    die(header("Location: ../register.php?error=3"));
}
 
?>