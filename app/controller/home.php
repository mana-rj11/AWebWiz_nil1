<?php

function main_home():string
{
    $menu_show =  get_menucsv();
	return join( "\n", [
		html_head( $menu_show ),
		html_body(),
		html_foot(),
	]);

}

?>