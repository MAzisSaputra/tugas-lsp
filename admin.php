<?php require 'template/session.php' ?>
    <?php
        if(empty($user) ||	$user->role === 2){
            header("Location: index.php");
        }else{
    ?> 
    <?php require 'template/header.php' ?>
    <?php require 'template/navbar.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h3>List Siswa</h3>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Username</td>
                            <td>Nama</td>
                            <td>Dibuat pada</td>
                        </tr>
                    </thead>
                    <?php 
                    $no = 1;
                    $stmt = $conn->prepare('SELECT * FROM user WHERE role = 2');
                    $stmt->execute();
                    while($users = $stmt->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $users->username;?></td>
                            <td><?= $users->nama;?></td>
                            <td><?= date("d-m-Y h:m:s", strtotime($users->created_at)); ?></td>
                        </tr>
                    </tbody>
                    <?php $no++; } ?>
                </table>
            </div>
            <!--  -->
            <h3>List Barang</h3>
            <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Barang</td>
                            <td>Deskripsi</td>
                            <td>pemilik</td>
                            <td>Dibuat pada</td>
                            <td>Diupdate pada</td>
                        </tr>
                    </thead>
                    <?php 
                    $no = 1;
                    $stmt = $conn->prepare('SELECT barang.id, barang.nama, user.username, barang.created_at FROM barang JOIN user ON barang.user_id=user.id');
                    $stmt->execute();
                    while($barang = $stmt->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <tbody>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $barang->nama;?></td>
                            <td><?= $barang->deskripsi;?></td>
                            <td><?= $barang->pemilik;?></td>
                            <td><?= date("d-m-Y h:m:s", strtotime($users->created_at)); ?></td>
                            <td><?= date("d-m-Y h:m:s", strtotime($users->updated_at)); ?></td>
                        </tr>
                    </tbody>
                    <?php $no++; } ?>
                </table>
        </div>
    </div>

    <?php require 'template/footer.php'; ?>
    <?php }?>