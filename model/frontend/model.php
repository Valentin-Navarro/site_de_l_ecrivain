<?php
require ('model/Billet.php');

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projet3;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
   
}
function getPosts()
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

function getPost($idBillet)
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

function getComments($idBillet)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date DESC LIMIT 0,10');
    $comments->execute(array($idBillet));
    $comments =[] ; 
    while($comments = $req->fetch())
    {
        $comment = new Comment ;
        $comment->id = $post['id'];
        $comment->author = $post['author'];
        $comment->content = $post['content'];
        $comment->creation_date_fr = $post['creation_date_fr'] ;

        return $comment

    }

    return $comments;
}

function postArticle ($title,$content) 
{
    $db = dbConnect();
    $article = $db->prepare('INSERT INTO billets (title,content,creation_date) VALUES (?,?, NOW())');
    $affectedLines = $article -> execute (array($title, $content));

    return $affectedLines;
}

function postComment ($idBillet,$author,$comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments (post_id,author,comment,creation_date,approuve,signaler) VALUES (?,?,?, NOW(),0,0)');
    $affectedLines = $comments -> execute (array ($idBillet, $author, $comment));

    return $affectedLines;

}

function connexion ($mail,$mdp)
{
    $db = dbConnect();
    $req = $db->prepare ('SELECT id,pseudo FROM membres WHERE mail = ? AND mdp= ?');
    $req ->execute(array($mail,$mdp));
    $membre = $req->fetch();
    
    return $membre ;
        
}

function addMembres ($pseudo,$mail,$mdp)
{
    $db = dbConnect();
    $insertmbr = $db->prepare('INSERT INTO membres (pseudo , mail, mdp) VALUES ( ?,?,?) ');
    $affectedLines = $insertmbr->execute(array($pseudo, $mail,$mdp));

    return $affectedLines;
}

function approveCommentModel ($approuve)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE comments SET approuve = 1 WHERE id = ?');
    $affectedLines = $req->execute(array($approuve)); 

    return $affectedLines;
}

function deleteCommentModel ($supprime)
{
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE id = ?');
    $affectedLines = $req->execute(array($supprime));

    return $affectedLines;
}      

function getAllComments()
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id,approuve, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments ORDER BY creation_date DESC');
    $comments->execute(array());

    return $comments;
}

function signalComment ($idComment)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE comments SET signaler = 1 WHERE id = ?');
    $affectedLines = $req->execute(array($idComment)); 

    return $affectedLines;
}

function majArticleModel($idBillet ,$title, $content)
{
    $db = dbConnect();
    $req = $db->prepare('UPDATE billets SET title = :title, content = :content WHERE id = :id');
    $affectedLines = $req->execute(['title' => $title ,'content' => $content ,'id' => $idBillet]);

    return $affectedLines;
}  

function deleteArticleModel ($supprime) 
{
  $db = dbConnect();
    $req = $db->prepare('DELETE FROM billets WHERE id = ?');
    $affectedLines = $req->execute(array($supprime));

    return $affectedLines; 
}
    
?>