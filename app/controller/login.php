<?php

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
        $is_valid = check_login($login);

        if ($is_valid) {
            // Connexion réussie
            $_SESSION['login']['is_logged'] = true;
            $_SESSION['login']['name'] = $login;
            header("Location: .");
            exit;
        } else {
            // Connexion échouée
            unset($_SESSION['login']);
            $msg = "Identifiant non valide. Veuillez réessayer.";
        }
    }

    // Afficher le formulaire ou un message de bienvenue
    echo <<<HTML
    <h1>Log in</h1>
HTML;

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
        <p>{$msg}</p>
HTML;
    }
}

?>
