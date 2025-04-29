<?php

require_once __DIR__ . "/../model/login.php";
require_once __DIR__ . "/../view/template.php"; // pour accéder à date_list()
// require_once __DIR__ . "/../model/article.php";
require_once __DIR__ . "/../view/home.php";
require_once __DIR__ . "/../model/common.php";


function main_home():string
{
    $menu =  get_menucsv();
    $dates = get_last_dates(); // on récupère les dates ici
    // $articles = get_articles_home("on n'est pas des pigeons", 10); // on récupère les bons articles

  //  $article = get_all_article_ac_sql();

    // Extraire le premier article pour l'affichage principa
  //  $bottom_article_aa = $article[0];

    // lire les articles
    // $articles = get_articles_for_home();

	return join( "\n", [
     //   html_home_main( $bottom_article_aa, $article),
		html_head( $menu, $dates ), // on les passe a la vue
		date_list( $dates ), // appel de la fonction
       // home_article_list($articles), // affiche les articles (10max)
		html_body(),
		html_foot(),
	]);

}


// cette fonction lis les articles du JSON
/** function get_articles_for_home():array
{
    $file = __DIR__ . "/../../asset/database/articles.json";

    if (!file_exists($file)) {
        return [];
    }

    $json = file_get_contents($file);
    $articles = json_decode($json, true);

    $filtered = [];

    foreach ($articles as $article) {
        if (
            isset($article['category']) &&
            trim(strtolower($article['category'])) == "on n'est pas des pigeons"
        ) {
            $filtered[] = $article;
        }
        if (count($filtered) >= 10) {
            break;
        }
    }
    return $filtered;
}
 */
?>