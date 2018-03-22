<?php 

require ('controlers/controlerPublic.php');
require ('controlers/controlerBack.php');

if (isset($_GET['action']) == false)
{
	page404();
	die();
}	
switch ($_GET['action']) 
{   
    case "listPosts":
        listPosts();
        
	case "post" :
		if (isset($_GET['id']) && $_GET['id'] > 0) 
		{
		 	post();
		} 	
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
		break;
	default: 
		page404();

	case "addArticle" :  
	if (
            !empty($_POST['author']) && 
            !empty($_POST['content']) && 
            !empty($_POST['title'])
        )   
        {
            addArticle($_POST['author'],$_POST['title'],$_POST['content']) ; 
        } 
        else
        {
            echo 'Erreur: tous les champs ne sont pas remplis .';
        }  

    case "addComment":
    if  (
            !empty($_GET['id']) && !empty($_POST['author']) && !empty($_POST['comment'])
        )
        {
            addComment($_GET['id'],$_POST['author'],$_POST['comment']);  
        }
        else
        {
            echo 'Erreur , tous les champs ne sont pas remplis .';
        }     

    case "deconnexion":
    	deconnexion();

	case "formInscription":   
		formInscription();

	case "validInscription":
	 if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']))
        {
            validInscription($_POST['pseudo'],$_POST['mail'],$_POST['mdp']); 
     
        }    
        else 
        {
            echo " erreur ";
        }	
    default:
        listPosts();
}

?>