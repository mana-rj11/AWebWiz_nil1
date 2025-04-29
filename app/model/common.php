<?php

// uniquement pour centraliser les utilitaires

function get_menucsv(): array {
    $file = __DIR__ . "/../../asset/database/menu.csv";
    $menu = [];

    // si le fichier n'existe pas
    if (!file_exists($file)) {
        return [["Erreur menu", "home"]];

    }

    // il ouvre le fichier
    if (($handle = fopen($file, "r")) !== false) {
        while (($data = fgetcsv($handle, 1000, "|")) !== false) {
            if (count($data) === 2) {
                $menu[] = [$data[0], $data[1]];
            }
        }
        fclose($handle);
    }

    return $menu;
}

/**  function get_pdo()
{
    static $pdo;

    if (empty($pdo))
    {
        $pdo = new PDO(DATABASE_DSN, DATABASE_USERNAME, DATABASE_PASSWORD);
        $pdo->query("SET NAMES utf8");
    }

    return $pdo;
} */


function get_last_dates(int $days = 7): array { // les 7 dernières dates
    $dates = [];
    for ($i = 1; $i <= $days; $i++) {
        $dates[] = date("Y-m-d", strtotime("-$i days"));
    }
    return $dates;
}

/**  function get_articles_home(string $category, int $max): array {
    $filename = __DIR__ . "/../../asset/database/articles.json";
    if (!file_exists($filename)) {
        return [];
    }

    $json = file_get_contents(__DIR__ . "/../../asset/database/article.json");
    $data = json_decode($json, true);

    if (!is_array($data)) {
        return [];
    }


    $articles = json_decode($json, true);

    // filtre par catégorie et vérifie que is_on_home est true
    $filtered = array_filter($data, function ($article) use ($category) {
        return isset($article['category'], $article['is_on_home'])
            && $article['category'] === $category
            && $article['is_on_home'] === true;
    });

    // limite de 10 articles
    return array_slice(array_values($filtered), 0, $max);
}

?> */