<?php

//AUTHORIZATION_ ACCESS CONTROL
//Check whether user is logged in

if(!isset($_SESSION['user'])){
     //Usre not logged in
     //redirect to login page with mssg
     $_SESSION['flogin'] = "<div class='error'>Please Login to Access Admin Pannel</div>";
     header('location:'.SIGNIN_URL);
}

?>