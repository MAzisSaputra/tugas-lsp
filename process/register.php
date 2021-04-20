<?php require '../koneksi.php';
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $refresh = header('location:../register.php');
    
    if(empty($username)){
        setcookie("error_register","Username anda kosoong", time() + 1,"/");
        echo $refresh;
    }elseif(empty($nama)){
        setcookie("error_register","Nama anda kosoong", time() + 1,"/");
        echo $refresh;
    }elseif(empty($password)){
        setcookie("error_register","Password anda kosoong", time() + 1,"/");
        echo $refresh;
    }else{
        $stmt = $conn->prepare("SELECT * FROM user WHERE
        username=$username");
        $stmt->execute();
        if($stmt->rowCount()){
            setcookie("error_register","User telah terdaftar!", time() + 2,"/");
            echo $refresh;
    }else{
        setcookie("error_register","",time()+2,"/");
        $hashPassword = password_hash($password,PASSWORD_DEFAULT);
        $register = $conn->prepare('INSERT INTO user(username,nama,password,role) VALUES(:username,:nama,:password,2)');
        $register->bindValue(':username', $username);
        $register->bindValue(':nama', $nama);
        $register->bindValue(':password', $hashPassword);
        $register->execute();
        header("Location:../login.php");
    }
}
