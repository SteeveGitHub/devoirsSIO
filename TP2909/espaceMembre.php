<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['typeMembre'])) {
    $email = $_SESSION['email'];
    $typeMembre = $_SESSION['typeMembre'];

    $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $typeMembre = htmlspecialchars($typeMembre, ENT_QUOTES, 'UTF-8');

    echo "<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='espaceMembre.css' rel='stylesheet'>
    <title>Espace Membre</title>
</head>
<body>
    <h1>Bienvenue $email dans l'Espace Membre $typeMembre</h1>
    <p>Contenu spécifique au membre $typeMembre.</p>
    <form action='deconnexion.php' method='post'>
        <input type='submit' value='Déconnexion'>
    </form>
</body>
</html>";
} else {
    echo "Aucun utilisateur connecté.";
}
?>
