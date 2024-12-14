<?php

function main_login()
{
	$action = @$_GET['action'] ?: "";
	$msg = '';

	if(isset($_POST['set_logout']))
	{
		// l'utilisateur est en train de se délogguer
		// logout_print();
		unset($_SESSION['logout']);
		$msg = 'Vous êtes déloggué.';
	}

	if(isset($_POST['set_login']))
	{
		// l'utilisateur est en train de s'identifier
        $login = $_POST['my_login'];
        $is_valid = check_login($login);
        if($is_valid) // si valide..
        {
            // utilisateur est identifié?
            // list( $valide, $_SESSION['login'], $_SESSION['role'] ) = login_validate($_POST['identifier']);
            $_SESSION['login']['is_logged'] = true;
            $_SESSION['login']['name'] = $login;
        }
        else
        {
            // si identification ratée
            // unknown_user_print();
            unset($_SESSION['login']);
            $msg = "Identifiant non valide. Veuillez réessayer.";
            // mauvais identifiant
        }
	}



    // ne s'est pas loggué
    echo form_login();

    if(isset($msg))
    {
        echo <<< HTML
            <p>$msg</p>
HTML;

    }





	{
		// l'utilisateur est déjà identifié
		// plus besoin du composant login
		// => redirection vers home page
		print('mouchard');
		header("Location: .");
	}
?>
<h1>Log in</h1>
<?php

if(isset($_SESSION['login']['is_logged'])
and $_SESSION['login']['is_logged'])
{
    // bienvenue
    echo <<< HTML
        <form method="POST">
            <p>Bienvenue {$_SESSION['login']['name']}</p>
            <button type="submit" name="set_logout">Log out</button> 
        </form>
HTML;
}


	if(isset($_POST['set_logout']))
	{
		// l'utilisateur n'est pas identifié
        unset($_SESSION['logout']);
		$msg .= "Vous vous êtes déloggué"();
	}
    else
    {
        // non loggué
        echo form_login();
        if(isset($msg))
        {
            echo <<< HTML
HTML;
        }
    }

    return join( "\n", [
		ctrl_head(),
		html_open_form(),
		$msg,
		html_link_home(),
		html_close_form(),
		html_foot()
	]);

}

?>