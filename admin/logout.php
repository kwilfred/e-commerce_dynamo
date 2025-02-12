<?php
include('../config/connect.php');
session_destroy();
echo "<script>
alert('You are now Loggedout');
window.location ='signin.php';
</script>";
//header('location:'.HOME_URL);
?>