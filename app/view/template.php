<?php
// Inclure le fichier contenant la fonction display_user_status()
require_once __DIR__ . '/../controller/login.php';



// Démarrer la session si elle n'est pas encore active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Afficher le statut de l'utilisateur
display_user_status();

/**
 * Génère la partie `<head>` et l'entête avec le menu.
 *
 * @param array $menu_array Tableau contenant les éléments du menu.
 * @return string
 */
function html_head($menu_array = [])
{
    $debug = false;
    // Sous-menu
    $sub_menu_array = [
        ["Latest", "latest"],
        ["World", "world"],
        ["Business", "business"],
        ["U.S.", "us"],
        ["Politics", "politics"],
        ["Economy", "economy"],
        ["Tech", "tech"],
        ["Markets & Finance", "markets"],
        ["Opinion", "opinions"],
        ["Arts", "arts"],
        ["Lifestyle", "lifestyle"],
        ["Real Estate", "real estate"],
        ["Personal Finance", "personal finance"],
        ["Health", "health"],
        ["Style", "style"],
        ["Sports", "sports"]

    ];


    // Valide le tableau des menus
    $menu_array = validate_menu_array($menu_array);

    ob_start();
    ?>
    <html lang="fr">
    <head>
        <title>AWebWiz Template (MVC)</title>
        <link rel="stylesheet" href="./css/bootstrap/bootstrap.min.css" />  <!-- lib externe -->
        <link rel="stylesheet" href="./css/internal/main.css" /> <!-- lib interne / perso -->
        <script
                src="https://code.jquery.com/jquery-3.4.1.js"
                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                crossorigin="anonymous"></script>
        <script src="./js/quirks/QuirksMode.js"></script>
        <script src="./js/internal/favorite.js"></script>
    </head>
    <body>
    <header>
            <div class="menu-container">
                <!-- Titre principal -->
                <h1 id="HomeTitle">THE WALL STREET JOURNAL.</h1>


                <!-- Menu principal -->
                <div class="menu-links">
                <?php
                foreach ($menu_array as $menu) {
                    // Vérifie que chaque élément est bien formé
                    $title = htmlspecialchars($menu[0], ENT_QUOTES, 'UTF-8');
                    $url = htmlspecialchars($menu[1], ENT_QUOTES, 'UTF-8');
                    echo <<<HTML
                    <a href="?page={$url}">{$title}</a> |
HTML;
                }
                ?>
                </div>
        </div>

    </header>

    <!-- Sous-menu (nav) -->
    <nav class="secondary-menu">
        <?php
        foreach ($sub_menu_array as $sub_menu) {
            $title = $sub_menu[0];
            $url = $sub_menu[1];
            echo <<< HTML
          <a href="?category={$url}">{$title}</a>
HTML;
        }
        ?>
    <div class="user-status-bar">
        <?php echo display_user_status(); ?> <!-- Affiche le statut utilisateur -->
    </div>
    </div>
    </nav>
    <?php

    if ($debug) {
        var_dump($_COOKIE);
        var_dump($_SESSION);
        var_dump($_GET);
        var_dump($_POST);
    }

    return ob_get_clean();
}

/**
 * Génère le pied de page HTML.
 *
 * @return string
 */
function html_foot()
{
    ob_start();
    ?>
    <hr />
    <footer>
        Made with the amazing AWebWiz framework
        <img src="./media/awebwiz.png" alt="AWebWiz logo">
    </footer>
    </body>
    </html>
    <?php
    return ob_get_clean();
}

/**
 * Valide et filtre les entrées du tableau `$menu_array`.
 *
 * @param array $menu_array Tableau contenant les éléments du menu.
 * @return array Tableau filtré et valide.
 */
function validate_menu_array($menu_array)
{
    return array_filter($menu_array, function ($menu) {
        return isset($menu[0], $menu[1]) && is_string($menu[0]) && is_string($menu[1]);
    });
}
