<?php

// Inclure le modèle pour utiliser la fonction login_validate
require_once __DIR__ . '/../model/login.php';


function main_login()
{
    $action = @$_GET['action'] ?: "";
    $msg = '';

    if (isset($_POST['set_logout'])) {
        // L'utilisateur se déconnecte
        unset($_SESSION['login']);
        $msg = "Vous êtes déloggué.";
    }

    if (isset($_POST['set_login'])) {
        // L'utilisateur tente de se connecter
        $login = $_POST['my_login'] ?? '';
        $password = $_POST['my_password'] ?? '';

        // Appelle la fonction pour valider les informations du modèle
        list($is_valid, $user_name, $role) = login_validate($login, $password);

        if ($is_valid) {
            // Connexion réussie
            $_SESSION['login']['is_logged'] = true;
            $_SESSION['login']['name'] = $user_name;
            $_SESSION['login']['role'] = $role; // Si le rôle est utilisé plus tard
            header("Location: .");
            exit;
        } else {
            // Connexion échouée
            unset($_SESSION['login']);
            $msg = "Identifiant ou mot de passe incorrect. Veuillez réessayer.";
        }
    }

    // Afficher le formulaire ou un message de bienvenue
    echo <<<HTML
    <h1>Connexion</h1>
HTML;

    // Ajouter le lien vers la page d'accueil
    echo html_link_home();

    if (isset($_SESSION['login']['is_logged']) && $_SESSION['login']['is_logged']) {
        // Utilisateur connecté
        $name = htmlspecialchars($_SESSION['login']['name']);
        echo <<<HTML
        <form method="POST">
            <p>Bienvenue {$name}</p>
            <button type="submit" name="set_logout">Log out</button>
        </form>
HTML;
    } else {
        // Utilisateur non connecté
        echo form_login();
    }

    // Afficher les messages d'erreur ou d'information
    if (!empty($msg)) {
        echo <<<HTML
        <p style="color:red;">{$msg}</p>
HTML;
    }
}



?>
