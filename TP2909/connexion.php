<?php
session_start();

$email_valide_commercial = "steeve@gmail.com";
$mot_de_passe_valide_commercial = "commerce123@";

$email_valide_comptable = "comptable@gmail.com";
$mot_de_passe_valide_comptable = "compta123@";

// ceci est comme la base de données, on définit 2 users : un commercial et un comptable

try {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // ceci sert pour la sécurité,
        // on vérifie que les champs sont bien remplis
        $email = $_POST['email'];
        $mot_de_passe = $_POST['password'];

        $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $mot_de_passe = htmlspecialchars($mot_de_passe, ENT_QUOTES, 'UTF-8');

        //l'utilisation de htmlspecialchars permet de sécuriser les données entrées par l'utilisateur

        if ($email === $email_valide_commercial && $mot_de_passe === $mot_de_passe_valide_commercial) {
            $_SESSION['email'] = $email;
            $_SESSION['typeMembre'] = 'commercial';
            header("Location: espaceMembre.php?type=commercial");
            exit();
        } else if($email === $email_valide_comptable && $mot_de_passe === $mot_de_passe_valide_comptable){
            $_SESSION['email'] = $email;
            $_SESSION['typeMembre'] = 'comptabilite';
            header("Location: espaceMembre.php?type=comptabilite");
            exit();
        } else {
            echo "<div style='
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        color: blue;
        background-color: yellow; 
        padding: 20px;
        border: 2px solid black; 
        border-radius: 10px; 
        width: 300px;
        margin: 0 auto; 
        margin-top: 10px; 
    '>Nom d'utilisateur ou mot de passe incorrect.</div>";
        }

        //la série de if permet de vérifier si les données entrées par l'utilisateur correspondent
        // à celles de la "base de données"
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
    //permet de gérer les erreurs
}
?>
