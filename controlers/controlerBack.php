<?php



function addArticle( $title, $content)
{	
	$etat = array_key_exists('pseudo',$_SESSION);

	if ($etat === true)
	{	
		$billetManager = new BilletManager();
		$affectedLines = $billetManager->postArticle($title, $content);	

		if ($affectedLines === false)
		{
			die('Erreur d\'ajout de l\'article');
		}
		else 
		{
			header('location: index.php?action=listPosts');
		}	
	}
	else 
	{
		header('location: index.php?action=connexion');	
	}	

}

function majArticleControler($idBillet , $title , $content)
{
	$etat = array_key_exists('pseudo',$_SESSION);

	if ($etat === true)
	{
		$billetManager = new BilletManager;
		$affectedLines = $billetManager->majArticleModel($idBillet ,$title , $content);

		if ($affectedLines === false)
		{
			die('Erreur d\'ajout de l\'article');
		}
		else 
		{
			header('location: index.php?action=listPosts');
		}	
	}
	else 
	{
		header('location: index.php?action=connexion');	
	}		
}


function traitementConnexion($mail,$mdp)
{
	$manager = new Manager;
	$mdp = sha1($mdp);
	$membre = $manager->connexion($mail,$mdp);
	
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

function deconnexion()
{
	session_destroy();
	header('location: index.php?action=listPosts'); 	
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

	if ($etat === true)
	{	
		$pseudo = $_SESSION['pseudo'];
		$commentManager = new CommentManager;
		$comments = $commentManager->getAllComments();
		$billetManager = new BilletManager;
		$billets = $billetManager->getPosts();
		

		require ('views/backend/pageAdmin.php');
	}
	else 
	{
		header('location: index.php?action=connexion');
	}

}

function deleteCommentControler($idComment)
{
	$etat = array_key_exists('pseudo',$_SESSION);

	if ($etat === true)
	{	
		$commentManager = new CommentManager;
		$suppComment = $commentManager->deleteCommentModel($idComment) ;

		header ('location:index.php?action=pageAdmin');
	}
	else 
	{
		header('location: index.php?action=connexion');
	}	
}

function formEditionArticle ($idBillet)
{	

	$etat = array_key_exists('pseudo',$_SESSION);

	if ($etat === true)
	{
		$billetManager = new BilletManager;
		$billet = $billetManager ->getPost($idBillet);

		require ('views/backend/editionArticle.php');
    }
    else
    {
    	header('location: index.php?action=connexion');
    }
}

function deleteArticleControler ($idBillet)
{
	$etat = array_key_exists('pseudo',$_SESSION);

	if ($etat === true)
	{
		$billetManager = new BilletManager;
		$suppArticle = $billetManager->deleteArticleModel($idBillet) ; 

		header ('location:index.php?action=pageAdmin');
	}
	else
	{
    	header('location: index.php?action=connexion');
    }	
}

?>

 