<?php 

class CommentManager 
{

	public function getComments($idBillet)
	{
        $manager = new Manager;
		$db = $manager-> dbConnect();
        $commentsRequest = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date DESC');
        $commentsRequest->execute([$idBillet]);
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
        $manager = new Manager;
		$db = $manager->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (post_id,author,comment,creation_date,signaler) VALUES (?,?,?, NOW(),0)');
        $affectedLines = $comments -> execute ([$idBillet, $author, $comment]);

        return $affectedLines;

	}

	public function deleteCommentModel($idComment) 
	{
        $manager = new Manager;
		$db = $manager->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $affectedLines = $req->execute([$idComment]);

        return $affectedLines;
	}

	public function getAllComments() 
	{
        $manager = new Manager;
        $db = $manager->dbConnect();
        $commentsRequest = $db->prepare('SELECT id, author, comment, signaler, DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments ORDER BY creation_date DESC');
        $commentsRequest->execute([]);
        $comments =[] ; 

        while($commentArray = $commentsRequest->fetch())
        {
            $commentObject = new Comment ;
            $commentObject->id = $commentArray['id'];
            $commentObject->author = $commentArray['author'];
            $commentObject->comment = $commentArray['comment'];
            $commentObject->signaler = $commentArray['signaler'];
            $commentObject->creation_date_fr = $commentArray['creation_date_fr'] ;
            $comments[] = $commentObject;
        }

        return $comments;
    }

	public function signalComment($idComment)
	{
        $manager = new Manager;
		$db = $manager->dbConnect();
        $req = $db->prepare('UPDATE comments SET signaler = 1 WHERE id = ?'); //comments = table ; signaler =  colonne  ; 
        $affectedLines = $req->execute([$idComment]); //

        return $affectedLines;
	}

    public function supprimeCommentBillet($idBillet)
    {
        $manager = new Manager;
        $db = $manager->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $affectedLines = $req->execute([$idBillet]);

        return $affectedLines;

    }
}