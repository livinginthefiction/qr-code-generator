<?php
session_start();
echo    $_SESSION["token"] = date('YmdHis');
// echo "success";
?>