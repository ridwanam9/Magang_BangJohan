<?php
$host       = 'localhost';
$user       = 'root'; 
$pass       = ''; 
$db         = 'proyek-magang';

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die('Gagal Terkoneksi');
}
?>