<?php

require_once ('model/frontend/model.php');
require_once ('model/BilletManager.php');
require_once ('model/CommentManager.php');

function addArticle( $title, $content)
{
	$affectedLines = postArticle($title, $content);

	if ($affectedLines === false)
	{
		die('Erreur d\'ajout de l\'article');
	}
	else 
	{
		header('location: index.php?action=listPosts');
	}	

}

function majArticleControler($idBillet , $title , $content)
{
	$affectedLines = majArticleModel($idBillet ,$title , $content);

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
		$_SESSION['pseudo'] = $membre['pseudo'] ; 
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

function formAddArticle()
{
	$etat = array_key_exists('pseudo',$_SESSION);

	if ($etat === true)
	{
		require ('views/backend/formAddArticle.php');
    }
    else
    {
    	header('location: index.php?action=connexion');
    }	
}

function pageAdmin ()
{
	$etat = array_key_exists('pseudo',$_SESSION);
	$comments = getAllComments();
	$billets = getPosts();
	if ($etat === true)
	{	
		require ('views/backend/pageAdmin.php');
	}
	else 
	{
		header('location: index.php?action=connexion');
	}


}

function deleteCommentControler($idComment)
{
	$suppComment = deleteCommentModel($idComment) ;

	header ('location:index.php?action=pageAdmin');
}

function formEditionArticle ($idBillet)
{
	$etat = array_key_exists('pseudo',$_SESSION);
	$billet = getPost($idBillet);

	if ($etat === true)
	{
		require ('views/backend/editionArticle.php');
    }
    else
    {
    	header('location: index.php?action=connexion');
    }
}

function deleteArticleControler ($idBillet)
{
	$suppArticle = deleteArticleModel($idBillet) ; 

	header ('location:index.php?action=pageAdmin');
}

?>

 