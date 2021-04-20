<?php require 'template/session.php' ?>
<?php if($user){
    echo "
        <script>
            alert('Maaf gabisa :P');
            location='index.php';
        </script>
    ";   
}else{
?>
<?php include 'template/header.php' ?>
<?php require 'template/navbar.php'; ?>

<?php isset($_COOKIE['error_login']) ? $error = $_COOKIE['error_login'] : $error = null ?>
<div class="container">
    <div class="mt-4">
        <form method="POST" action="process/login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <?php if ($error) { ?>
                <div class="alert alert-danger"><?php echo $error ?></div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
        </form>
    </div>
</div>
<?php include 'template/footer.php' ?>
<?php } ?>
