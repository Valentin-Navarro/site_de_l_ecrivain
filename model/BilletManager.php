<?php 

require_once("model/Manager.php");

Class BilletManager 
{
	public $content ; 
	public $creation_date_fr ;


	public function getPosts()
	{
		$db = dbConnect();
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
		$db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
    $req->execute(array($idBillet));
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
		$db = dbConnect();
    $article = $db->prepare('INSERT INTO billets (title,content,creation_date) VALUES (?,?, NOW())');
    $affectedLines = $article -> execute (array($title, $content));

    return $affectedLines;
	}

	public function majArticleModel($idBillet ,$title, $content)
	{
		$db = dbConnect();
    $req = $db->prepare('UPDATE billets SET title = :title, content = :content WHERE id = :id');
    $affectedLines = $req->execute(['title' => $title ,'content' => $content ,'id' => $idBillet]);

    return $affectedLines;
	}

	public function deleteArticleModel($supprime)
	{
		$db = dbConnect();
    $req = $db->prepare('DELETE FROM billets WHERE id = ?');
    $affectedLines = $req->execute(array($supprime));

    return $affectedLines; 
	}
}