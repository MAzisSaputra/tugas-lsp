<?php require 'template/session.php' ?>
    <?php
        if(empty($user) ||	$user->role == 1){
            header("Location: index.php");
        }else{
    ?> 
    <?php require 'template/header.php' ?>
    <?php require 'template/navbar.php'; ?>

    <div class="container">
        <div class="row">
        <div class="col">
        <h3>List Barang</h3>
        <form action="process/barang/tambah.php" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="name" name="nama">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
        </form>
        </div>
            <div class="col">
                <h3>List Siswa</h3>
            
            </div>
        </div>
    </div>

    <?php }?>