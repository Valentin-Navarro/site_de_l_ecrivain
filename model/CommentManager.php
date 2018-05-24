<?php 

class CommentManager 
{
	public $content ; 
	public $creation_date_fr ;


	private function dbConnect() // rendre la fonction dbconnect privée car personne ne doit pouvoir y acceder depuis l'exterieur de la Class 
	{
		$db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
	}

	public function getComments($idBillet)
	{
		$db = dbConnect();
    $commentsRequest = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date DESC LIMIT 0,10');
    $commentsRequest->execute(array($idBillet));
    $comments =[] ; 
    while($commentArray = $commentsRequest->fetch())
    {
        $commentObject = new Comment ;
        $commentObject->id = $commentArray['id'];
        $commentObject->author = $commentArray['author'];
        $commentObject->comment = $commentArray['comment'];
        $commentObject->creation_date_fr = $commentArray['creation_date_fr'] ;
        $comments[] = $commentObject;
    }

    return $comments;
	}

	public function postComment($idBillet,$author,$comment)
	{
		$db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments (post_id,author,comment,creation_date,approuve,signaler) VALUES (?,?,?, NOW(),0,0)');
    $affectedLines = $comments -> execute (array ($idBillet, $author, $comment));

    return $affectedLines;

	}

	public function approveCommentModel($approuve)
	{
		$db = dbConnect();
    $req = $db->prepare('UPDATE comments SET approuve = 1 WHERE id = ?');
    $affectedLines = $req->execute(array($approuve)); 

    return $affectedLines;
	}

	public function deleteCommentModel($supprime)
	{
		$db = dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE id = ?');
    $affectedLines = $req->execute(array($supprime));

    return $affectedLines;
	}

	public function getAllComments()
	{
		$db = dbConnect();
    $comments = $db->prepare('SELECT id,approuve, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments ORDER BY creation_date DESC');
    $comments->execute(array());

    return $comments;
	}

	public function signalComment()
	{
		$db = dbConnect();
    $req = $db->prepare('UPDATE comments SET signaler = 1 WHERE id = ?');
    $affectedLines = $req->execute(array($idComment)); 

    return $affectedLines;
	}
}