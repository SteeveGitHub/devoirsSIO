<?php
session_start();
// on démarre la session

session_destroy();

// on détruit la session

header("Location: login.html");
// redirection vers la page de connexion
exit();
?>
