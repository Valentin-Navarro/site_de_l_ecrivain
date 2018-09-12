<?php 


class BilletManager // le billet manager est là pour creer et supprimer les billet , pas les stocker 
{
	private $db ;

    
    public function getPosts()
	{
        $manager = new Manager;
		$db = $manager-> dbConnect();
        //$db = $this->db;
        $req = $db->query('SELECT id, title , content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 10');
        $billets = [] ;
        while ($post = $req->fetch()) 
        {
            $billet = new Billet ;
            $billet->id = $post['id'] ; 
            $billet->title = $post['title'] ; 
            $billet->content = $post['content'] ; 
            $billet->creation_date_fr = $post['creation_date_fr'] ;
            $billets[] = $billet;
        }
        
        return $billets;
	}

	public function getPost($idBillet)
	{
        $manager = new Manager;
		$db = $manager-> dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
        $req->execute([$idBillet]);
        $post = $req->fetch();
        $billet = new Billet ;
        $billet->id = $idBillet;
        $billet->title = $post['title'] ; 
        $billet->content = $post['content'] ; 
        $billet->creation_date_fr = $post['creation_date_fr'] ;

        return $billet;
	}

	public function postArticle($title,$content)
	{  
        $manager = new Manager;
		$db = $manager->dbConnect();
        $article = $db->prepare('INSERT INTO billets (title,content,creation_date) VALUES (?,?, NOW())');
        $affectedLines = $article -> execute ([$title, $content]);

        return $affectedLines;
	}

	public function majArticleModel($idBillet ,$title, $content)
	{
        $manager = new Manager;
		$db = $manager->dbConnect();
        $req = $db->prepare('UPDATE billets SET title = :title, content = :content WHERE id = :id');
        $affectedLines = $req->execute(['title' => $title ,'content' => $content ,'id' => $idBillet]);

        return $affectedLines;
	}

	public function deleteArticleModel($supprime)
	{
        $manager = new Manager;
		$db = $manager->dbConnect();
        $req = $db->prepare('DELETE FROM billets WHERE id = ?');
        $affectedLines = $req->execute([$supprime]);

        return $affectedLines; 
	}
}