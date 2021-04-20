<?php
require '../../koneksi.php';
session_start();
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$refresh = header("Location:../../user.php");

// mengelola data
$stmt = $conn->prepare("SELECT id FROM user WHERE username=:username");
$stmt->bindValue(':username', $_SESSION['username']);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_OBJ);

//Tambah Data
$insert = $conn->prepare("INSERT INTO barang(nama,deskripsi,user_id) VALUES ('$nama','$deskripsi','$user->id')");
$insert->execute();
header("Location:../../user.php");