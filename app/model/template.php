<?php

function get_menucsv()
{
    $filename = "../asset/database/menu.csv";
    $menu_string = file_get_contents($filename);
    $menu_array = explode("\n", $menu_string);
    $menu_aa = [];
    foreach ($menu_array as $menu)
    {
        $menu_aa[] = explode('|', $menu);
    }
    return $menu_aa;
}
?>