<?php 

require ('controlers/controlerPublic.php');

if (isset($_GET['action']) == false)
{
	page404();
	die();
}	
switch ($_GET['action']) {
	case "accueil" :
		echo "accueil";
		break; 
	case "listPost":
		echo "listPost";
		break;
	default: 
		page404();
}