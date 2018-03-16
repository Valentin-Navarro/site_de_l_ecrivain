<?php 

require ('controlers/controlerPublic.php');

if (isset($_GET['action']) == false)
{
	page404();
	die();
}	
switch ($_GET['action']) 
{
	case "post" :
		if (isset($_GET['id']) && $_GET['id'] > 0) 
		{
		 	post();
		} 	
		 
	case "listPosts":
		listPosts();
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
            var_dump($_GET); 
            var_dump($_POST);
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

}

default:
listPosts();