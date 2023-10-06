<?php
session_start();


if (!isset($_SESSION["user_id"])) {

    header("Location: login.html");
    exit();
}


require_once("db.php");

$user_id = $_SESSION["user_id"];

try {
    $query = "SELECT first_name, last_name, email FROM users WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Utilisateur introuvable.");
    }
} catch (PDOException $e) {
    die("Erreur lors de la récupération des informations de l'utilisateur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Bienvenue, <?php echo $user["first_name"]; ?></h1>
<p>Voici quelques informations sur votre compte :</p>
<ul>
    <li><strong>Nom :</strong> <?php echo $user["last_name"]; ?></li>
    <li><strong>Email :</strong> <?php echo $user["email"]; ?></li>
</ul>
<p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>
