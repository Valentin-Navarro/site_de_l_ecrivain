<?php 

require_once ('model/model.php');

function page404()
{
	require ('views/erreur_404.php');
}

function listPosts()
{
	$posts = getPosts();
	require ('view/frontend/listPostView.php');
}

function post()
{
	$post = getPost($_GET['id']);
	$comments = getComments($_GET['id']);

	require ('view/frontend/postView.php');
}

function connexionForm ()
{
	require ('view/frontend/connexion.php');

function formInscription()
{
	require ('view/frontend/inscription.php');
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
