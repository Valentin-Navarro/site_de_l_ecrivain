<?php

require_once ('model/frontend/model.php');

function addArticle($author, $title, $content)
{
	$affectedLines = postArticle($author, $title, $content);

	if ($affectedLines === false)
	{
		die('Erreur d\'ajout de l\'article');
	}
	else 
	{
		header('location: index.php?action=listPosts');
	}	

}

function traitementConnexion($mail,$mdp)
{
	$mdp = sha1($mdp);
	$membre = connexion($mail,$mdp);
	
	if ($membre === false)
	{
		die ('Erreur , les identifiants sont incorrects');
	}
	else 
	{
		$_SESSION['pseudo']= $membre['pseudo'] ; 
		header('location: index.php?action=listPosts');
	}


}

function validInscription($pseudo, $mail, $mdp)
{
	$mdp= sha1($mdp);
	$affectedLines = addMembres($pseudo, $mail, $mdp);


	if ($affectedLines === false)
	{
		die('Erreur d\'ajout du membre');
	}
	else 
	{
		header('location: index.php?action=listPosts'); 
	}	
}

function deconnexion()
{
	if (session_start());
	{
		session_destroy();
		header('location: index.php?action=listPosts'); 
	}
}

