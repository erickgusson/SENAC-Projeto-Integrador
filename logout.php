<?php
session_start();

session_destroy();

echo "<script>history.go(-1);</script>"
?>