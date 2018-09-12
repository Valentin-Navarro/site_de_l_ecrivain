<?php

class Manager 
{
	public function dbConnect()
	{ 
		$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
	}

	public	function connexion ($mail,$mdp)
	{
    	$db = $this->dbConnect();
    	$req = $db->prepare ('SELECT id,pseudo FROM membres WHERE mail = ? AND mdp= ?');
    	$req ->execute([$mail,$mdp]);
    	$membre = $req->fetch();
    	
    	return $membre ;
    }

}

