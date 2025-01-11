<?php

/**
 * Bouton de déconnexion (logout)
 *
 * @return string
 */
function html_logout_button()
{
    return <<<HTML
    <p>
        <a href="?page=login&action=logout" class="btn btn-logout">Log out</a>
    </p>
HTML;
}



/**
 * Formulaire de connexion
 *
 * @return string
 */
function form_login()
{
    return <<<HTML
    <form method="post">
        <label for="my_login">Votre nom :</label>
        <input type="text" id="my_login" name="my_login" required>
        
        <label for="my_password">Votre mot de passe :</label>
        <input type="password" id="my_password" name="my_password" required>
        
        <button name="set_login" type="submit" class="btn btn-submit">Se connecter</button>
    </form>
HTML;
}

/**
 * Afficher un message de bienvenue ou d'état de connexion
 *
 * @param bool   $is_logged Utilisateur logué ou non
 * @param string $name      Nom de l'utilisateur logué
 * @return string
 */
function html_user_status($is_logged, $name = "inconnu")
{
    if ($is_logged) {
        $safe_name = htmlspecialchars($name);
        return <<<HTML
        <p class="user-status">Bonjour, {$safe_name}</p>
HTML;
    } else {
        return <<<HTML
        <p class="user-status">Utilisateur non identifié</p>
HTML;
    }
}

/**
 * Lien vers la page d'accueil
 *
 * @return string
 */
function html_link_home()
{
    return <<<HTML
    <p>
        <a href="." class="btn btn-home">Retour à l'accueil</a>
    </p>
HTML;
}

/**
 * Afficher un message d'erreur ou d'information
 *
 * @param string $msg Message à afficher
 * @return string
 */
function html_message($msg)
{
    if (!empty($msg)) {
        return <<<HTML
        <p class="message">{$msg}</p>
HTML;
    }
    return '';
}

?>
