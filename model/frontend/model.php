<?php
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
    $req = $db->query('SELECT id, title ,author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets ORDER BY creation_date DESC LIMIT 0, 5');
    
     return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM billets WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM comments WHERE post_id = ? ORDER BY creation_date DESC LIMIT 0,10');
    $comments->execute(array($postId));

    return $comments;
}

function postArticle ($author,$title,$content) 
{
    $db = dbConnect();
    $article = $db->prepare('INSERT INTO billets (author,title,content,creation_date) VALUES (?,?,?, NOW())');
    $affectedLines = $article -> execute (array($author, $title, $content));

    return $affectedLines;
}

function postComment ($postId,$author,$comment)
{
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments (post_id,author,comment,creation_date) VALUES (?,?,?, NOW())');
    $affectedLines = $comments -> execute (array ($postId, $author, $comment));

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
?>