<?php
session_start();

session_destroy();

header('location: login-cadastro.php');
// echo "<script>history.go(-1);</script>"
?>