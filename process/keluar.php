<?php
    session_start();
    session_unset();
    session_destroy();
    $_SESSION = [];
    echo "
        <script>
        alert('Anda Telah Keluar');
        location='login.php';
        </script>
    ";
?>