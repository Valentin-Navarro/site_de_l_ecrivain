<?php

require_once ('model/frontend/model.php');

function page404()
{
	require ('views/frontend/erreur_404.php');
}

function listPosts()
{
	$posts = getPosts();

	require ('views/frontend/listPostsView.php');
}

function post($idBillet)
{
	$post = getPost($idBillet);
	$comments = getComments($idBillet);
	require ('views/frontend/postView.php');
}
  


function addComment ($idBillet, $author,$comment)
{
	$affectedLines = postComment ($idBillet, $author, $comment);

	if ($affectedLines === false)
	{
		die ('Erreur d\' ajout du commentaire');
	}
	else
	{
		header ('location: index.php?action=post&id=' . $idBillet);
	}	
}

function connexionForm ()
{
	require ('views/frontend/connexion.php');
}


function formInscription()
{
	require ('views/frontend/inscription.php');
}

function signalerComment($idBillet)
{
	$alertComment = signalComment($idBillet);
	
	header ('location: index.php?action=listPosts');
	echo 'Vous avez bien signalé ce commentaire';
}

?>




