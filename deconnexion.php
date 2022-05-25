<?php 
    session_start();                     //démarrer la session
    session_destroy();                   //la détruire
    header('Location:index0.php');        //Redériger vers index.php
    die();