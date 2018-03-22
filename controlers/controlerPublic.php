<?php

require_once ('model/frontend/model.php');

function listPosts()
{
	$posts = getPosts();

	require ('views/frontend/listPostsView.php');
}

function post()
{
	$post = getPost($_GET['id']);
	$comments = getComments($_GET['id']);

	require ('views/frontend/postView.php');
}
  


function addComment ($postId, $author,$comment)
{
	$affectedLines = postComment ($postId, $author, $comment);

	if ($affectedLines === false)
	{
		die ('Erreur d\' ajout du commentaire');
	}
	else
	{
		header ('location: index.php?action=post&id=' . $postId);
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







