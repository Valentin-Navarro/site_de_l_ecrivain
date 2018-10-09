<?php 

class ConnexionMembres 
{
	public $db ;

	public function __construct($connexion)
	{
		$this->db = $connexion;
	}


	public	function connexion ($mail,$mdp)
	{
    	$req = $this->db->prepare ('SELECT id,pseudo,mdp FROM membres WHERE mail = ?');
    	$req ->execute([$mail]);
    	$membre = $req->fetch();

        if (password_verify($mdp,$membre["mdp"])) 
        {
            echo 'Le mot de passe est valide !';
        } else 
        {
            echo 'Le mot de passe est invalide.';
        }
    	return $membre ;
    }
}