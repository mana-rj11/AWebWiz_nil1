<?php

/**
 * Bouton de déconnexion (logout)
 *
 * @return string
 */
function html_logout_button()
{
    ob_start();
    ?>
    <a href="?page=login&action=logout">Log out</a>
    <?php
    return ob_get_clean();
}

/**
 * Bouton de connexion (login)
 *
 * @param string $user Nom de l'utilisateur (optionnel)
 * @return string
 */
function html_login_button($user = "inconnu")
{
    ob_start();
    ?>
    <a href="?page=login&action=login">Log in</a>
    <?php
    return ob_get_clean();
}

/**
 * Ouvrir un formulaire
 *
 * @return string
 */
function html_open_form()
{
ob_start();
?>
<form method="post">
    <?php
    return ob_get_clean();
    }

    /**
     * Fermer un formulaire
     *
     * @return string
     */
    function html_close_form()
    {
    ob_start();
    ?>
</form>
<?php
return ob_get_clean();
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
        <button name="set_login" type="submit">Se connecter</button>
    </form>
HTML;
}

/**
 * Lien vers la page d'accueil
 *
 * @return string
 */
function html_link_home()
{
    ob_start();
    ?>
    <p>
        <a href=".">Retour à l'accueil</a>
    </p>
    <?php
    return ob_get_clean();
}

?>
