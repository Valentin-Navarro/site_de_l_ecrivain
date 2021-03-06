<?php 
session_start();
require ('controlers/controlerPublic.php');
require ('controlers/controlerBack.php');
require ('model/Billet.php');
require ('model/BilletManager.php');
require ('model/Comment.php');
require ('model/CommentManager.php');
require ('model/Manager.php');
require ('model/ConnexionMembres.php');

if (isset($_GET['action']) == false)
{
	page404();
	die();
}	
switch ($_GET['action']) 
{   
    case "listPosts":
        listPosts();
        break;
        
	case "post" :
		if (isset($_GET['id']) && $_GET['id'] > 0) 
		{
		 	post($_GET['id']);
		} 	
        else
        {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
		break;

    case "pageAdmin" :
        pageAdmin();
        break;

        

    case "formAddArticle":
        formAddArticle();
        break;

	case "addArticle" :  
    //proteger mon traitement 
	   if (
            !empty($_POST['content']) && 
            !empty($_POST['title'])
        )   
        {
            addArticle($_POST['title'],$_POST['content']) ; 
        } 
        else
        {
            echo 'Erreur: tous les champs ne sont pas remplis .';
        }  
        break;

    case "editionArticle":
        formEditionArticle($_GET['id']);
        break ;

    case "deleteArticle":
        deleteArticleControler($_GET['id']);   
        break ;     
            

    case "majArticle":
        if (
            !empty($_POST['title']) && 
            !empty($_POST['content'])
        )   
        {
            majArticleControler($_GET['id'],$_POST['title'],$_POST['content']) ;            
        } 
        else
        {
            echo 'Erreur: tous les champs ne sont pas remplis .';
        }  
        break; 

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
        break;

    case "signalComment":
        signalerComment($_GET['id']);   
        break;

    case "deleteComment":
        if(isset($_GET['idComment']) AND !empty($_GET['idComment'])) 
        
        {
            deleteCommentControler($_GET['idComment']);  
        }
        else
        {
            echo "Erreur il manque un paramètre" ;
        }
        break;   

    case "connexion":
        connexionForm();  
        break; 

    case "traitementConnexion":
        if (
            !empty($_POST['mailconnect'])&&
            !empty($_POST['mdpconnect'])
        )
        {
            traitementConnexion($_POST['mailconnect'],$_POST['mdpconnect']);
        }
        else
        {
            var_dump($_POST);
            echo ' Erreur, il y a un champ vide';
        }

        break;

    case "deconnexion":
    	deconnexion();
        break;

	case "inscription":   
		formInscription();
        break;



	case "validInscription":
        if (!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']))
        {
            validInscription($_POST['pseudo'],$_POST['mail'],$_POST['mdp']); 
     
        }    
        else 
        {
            echo " erreur ";
        }
        break;	
    default:
       page404();
}


?>