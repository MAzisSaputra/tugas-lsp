<?php
session_start();
require('../koneksi.php');
$username = $_POST["username"];
$password = $_POST["password"];
$refresh = header("Location: ../login.php");

if (empty($username)) {
    setcookie("error_login","Username anda kosong", time() + 1,"/");
    echo $refresh;
} elseif (empty($password)) {
    setcookie("error_login","Password anda kosong", time() + 1,"/");
    echo $refresh;
} else {
    $stmt = $conn->prepare("SELECT * FROM user WHERE username=:username");
    $stmt->bindValue(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount()) {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        if (password_verify($password, $row->password)) {
            setcookie("error_login","", time() + 1,"/");
            $_SESSION['username'] = $row->username;
            $_SESSION["login"] = true;
            header("Location:../index.php");
        } else {
            setcookie("error_login","username dan password tidak sesuai", time() + 1,"/");
            echo $refresh;
        }
    } else {
        setcookie("error_login","username dan password tidak ada!", time() + 1,"/");
        echo $refresh;
    }
}