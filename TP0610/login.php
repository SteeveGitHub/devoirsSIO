<?php
require_once("db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        $query = "SELECT id, email, password_hash FROM users WHERE email = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password_hash"])) {
            session_start();
            $_SESSION["user_id"] = $user["id"];
            header("Location: welcome.php");
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        die("Erreur lors de la connexion : " . $e->getMessage());
    }
}
?>
